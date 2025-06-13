<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Tampilkan form register
    public function showForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
           $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
            'age_category' => ['required', 'in:remaja,dewasa,lansia'],
            ]);

                

                $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'age_category' => $request->age_category,
        ]);

        

        Auth::login($user);

        return redirect()->route('home');
    }
}
