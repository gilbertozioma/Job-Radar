<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    // Store/Register User
    public function store(Request $request)
    {
        // Validate form fields
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:4'
        ]);

        // Store user's photo if uploaded
        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Hash the user's password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create the user
        $user = User::create($formFields);

        // Log in the user immediately after registering
        auth()->login($user);

        // Redirect to the home page with a flash message
        return redirect('/')->with('message', 'User created and logged in.');
    }

    // Logout User
    public function logout(Request $request)
    {
        // Log out the authenticated user
        auth()->logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the home page with a flash message
        return redirect('/')->with('message', 'You have been logged out!');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        // Validate form fields
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt($formFields)) {
            // Regenerate the session
            $request->session()->regenerate();

            // Redirect to the home page with a flash message
            return redirect('/')->with('message', 'You have been logged in!');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
