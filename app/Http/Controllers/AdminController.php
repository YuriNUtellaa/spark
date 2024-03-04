<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\User;
use App\Models\Admin;
use App\Models\SlotRental;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('Admin.login');
    }

    public function showAdminSlot()
    {
        $slots = Slot::all();
        $rentals = SlotRental::with('user')->whereNull('end_time')->get();
        $reservations = Reservation::with('user')->whereNull('end_time')->get();
        return view('Admin.slotsControl', compact('slots', 'rentals', 'reservations'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/slots-control-admin');
        } else {
            return back()->withErrors(['error' => 'Invalid username or password']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('Admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:6',
        ]);

        try {
            $admin = new Admin();
            $admin->username = $request->username;
            $admin->password = bcrypt($request->password);
            $admin->save();

            return redirect()->route('login-admin')->with('success', 'Admin registration successful. Please log in.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to register admin. Please try again.']);
        }
    }

    // RENT & RESERVATION HISTORY

    public function showAdminHistory()
    {
        $slotRentals = SlotRental::with('user')->orderBy('created_at', 'desc')->get();
        $reservations = Reservation::with('user')->orderBy('created_at', 'desc')->get();

        return view('Admin.historyAdmin', compact('slotRentals', 'reservations'));
    }

        // DELETE FUNCTION

            public function deleteSlotRental($id)
            {
                $slotRental = SlotRental::findOrFail($id);
                $slotRental->delete();
                return back()->with('success', 'Slot rental deleted successfully.');
            }

            public function deleteReservation($id)
            {
                $reservation = Reservation::findOrFail($id);
                $reservation->delete();
                return back()->with('success', 'Reservation deleted successfully.');
            }

        // UPDATE FUNCTION

            public function updateSlotRental(Request $request, $id)
            {
                $request->validate([
                    'start_time' => 'required|date',
                    'end_time' => 'required|date|after_or_equal:start_time',
                ]);

                $slotRental = SlotRental::findOrFail($id);
                $slotRental->update([
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                ]);

                return back()->with('success', 'Slot rental updated successfully.');
            }

            public function updateReservation(Request $request, $id)
            {
                $request->validate([
                    'start_time' => 'required|date',
                    'end_time' => 'required|date|after_or_equal:start_time',
                ]);

                $reservation = Reservation::findOrFail($id);
                $reservation->update([
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                ]);

                return back()->with('success', 'Reservation updated successfully.');
            }

    // USERMANAGEMENT

    public function showUserManagement()
    {
        $users = User::all(); // Fetch all users
        return view('Admin/usermanagementAdmin', compact('users')); // Pass users to the view
    }

    public function updateUser(Request $request, User $user)
    {
        // Validate the input
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|min:6',
            'plate_number' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update the user
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->plate_number = $validatedData['plate_number'];
        $user->type = $validatedData['type'];
    
        if ($request->hasFile('image')) {
            $imageName = $user->id . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('profiles'), $imageName);
            $user->image = $imageName;
        }
    
        $user->save();
    
        return redirect()->route('admin.user-management')->with('success', 'User updated successfully.');
    }
    
    public function deleteUser(User $user)
        {
            $user->delete(); // This deletes the user from the database
            return redirect()->route('admin.user-management')->with('success', 'User deleted successfully.');
        }
    

    
}
