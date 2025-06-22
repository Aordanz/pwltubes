<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // =================================================================
            // PERBAIKAN TOTAL DI SINI
            // 1. Cek dulu apakah rolenya 'doctor'
            // 2. Jika bukan, baru cek 'age_category'
            // =================================================================
            
            if ($user->role === 'doctor') {
                return redirect()->route('doctor.dashboard');
            }

            // Untuk role 'user', kita redirect berdasarkan age_category
            switch ($user->age_category) { // <-- MENGGUNAKAN KOLOM YANG BENAR
                case 'remaja':
                    return redirect()->route('program.remaja');
                
                case 'dewasa':
                    return redirect()->route('program.dewasa');
                
                case 'lansia':
                    return redirect()->route('program.lansia');

                default:
                    // Fallback jika age_category kosong atau tidak valid
                    return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}