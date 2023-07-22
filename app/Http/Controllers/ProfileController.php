<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Get the authenticated user's data
        $user = Auth::user();

        // Add any additional data you want to pass to the view
        $pageTitle = 'User Profile';

        // Return the view with the user's data
        return view('profile', compact('user', 'pageTitle'));
    }

    public function edit()
    {
        $user = Auth::user();

        $pageTitle = 'Edit Profile';
        return view('profile.edit', compact('user', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(), // Unique email except for the authenticated user
            'password' => 'nullable|string|min:8|confirmed', // Optional password update
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's data
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Check if the password is being updated and set the new password
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Save the updated user data
        $user->save();

        // Redirect back to the profile edit page with a success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
