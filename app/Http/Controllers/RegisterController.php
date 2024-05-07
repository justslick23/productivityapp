<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Check if user was created successfully
        if ($user) {
            // Flash success message to session
            Session::flash('success', 'User created successfully!');
            // Redirect to a desired page (e.g., dashboard)
            return redirect()->route('login');
        } else {
            // Flash error message to session
            Session::flash('error', 'Failed to create user. Please try again.');
            // Redirect back to the registration page
            return redirect()->route('register');
        }
    }
}
