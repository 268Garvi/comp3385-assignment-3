<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Load the view with the login form
        return view('login');
    }

    public function store(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        // Validate the user's credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user's credentials are correct
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('/dashboard')->with('success', 'Login successful');
        } else {
            // Authentication failed
            return redirect('/login')->with('error', 'Invalid credentials. Check the email address and password entered');
        }
    }
}
