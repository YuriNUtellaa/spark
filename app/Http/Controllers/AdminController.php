<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('Admin/login');
    }

    public function showAdminDashboard()
    {
        $slots = Slot::all();
        return view('Admin/home', compact('slots'));
    }

    public function login(Request $request)
    {
        // Validate the user input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the admin
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/home-admin'); // Redirect to the intended URL or a default path
        }
    
        // Authentication failed
        return back()->withErrors(['error' => 'Invalid credentials']); // Redirect back with an error message
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
        return view('Admin/register');
    }

    public function register(Request $request)
    {
        // Validate the admin input
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required|min:6',
            // Add more validation rules as needed
        ]);

        // Hash the admin's password
        $hashedPassword = bcrypt($request->password);

        // Create a new admin instance
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = $hashedPassword;
        // Populate other admin fields if needed

        // Save the admin to the database
        $admin->save();

        // Redirect the admin after successful registration
        return redirect()->route('login-admin')->with('success', 'Admin registration successful. Please log in.');
    }

}
