<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // pastikan view ini ada
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('doctor')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/doctor/chat');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }
}
