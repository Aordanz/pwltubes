<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfDoctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. Cek apakah pengguna sudah login DAN memiliki role 'doctor'
        if (Auth::check() && Auth::user()->role === 'doctor') {
            // 2. Jika ya, izinkan akses ke halaman berikutnya
            return $next($request);
        }

        // 3. Jika tidak, tolak akses dan tampilkan halaman error 403 (Forbidden)
        abort(403, 'AKSES DITOLAK: ANDA BUKAN DOKTER.');
    }
}