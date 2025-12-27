<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->email === 'admin@admin.com') {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();
        }

        return back()->withErrors([
            'email' => 'Email atau password admin salah.',
        ])->onlyInput('email');
    }
}
