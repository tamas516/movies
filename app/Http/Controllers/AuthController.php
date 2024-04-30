<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();

        User::create($validated);

        return redirect()->route('main')->with('success', 'User created successfully!');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(LoginUserRequest $request)
    {
        $validated = $request->validated();

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('main')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('users.login')->withErrors([
            'email' => 'No matching user with this email!'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('main')->with('success', 'Logged out successfully!');
    }
}
