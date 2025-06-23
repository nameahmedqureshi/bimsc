<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Check if the authenticated user is active
        // $user = Auth::user();
        // if ($user->status !== '1') {
        //     Auth::logout(); // log out the user just in case they were logged in

        //     throw ValidationException::withMessages([
        //         'email' => ['Your account is not active. Please contact support.'],
        //     ]);
        // }

        return response()->json([
            'message' => 'Login successful',
            'redirect' => route('dashboard')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

}