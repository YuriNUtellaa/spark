<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Admin;
use App\Models\SlotRental;
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
        return view('Admin.slotsControl', compact('slots', 'rentals'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the admin
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/slots-control-admin');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
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
        // Validate the admin input
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:6',
        ]);

        // Hash the admin's password
        $hashedPassword = bcrypt($request->password);

        // Create a new admin instance
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = $hashedPassword;

        // Save the admin to the database
        $admin->save();

        // Redirect the admin after successful registration
        return redirect()->route('login-admin')->with('success', 'Admin registration successful. Please log in.');
    }
}
