<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AktivitasDewasa; // <-- Import model yang benar
use App\Models\ActivityUser;    // <-- Import model untuk cek status
use Illuminate\Support\Facades\Auth;   // <-- Import fasad Auth

class DewasaActivityController extends Controller
{
    /**
     * Menampilkan detail aktivitas berdasarkan nomor hari.
     *
     * @param  int  $hari
     * @return \Illuminate\View\View
     */
    public function show($hari)
    {
        // 1. Ambil data detail aktivitas dari database berdasarkan HARI
        $activity = AktivitasDewasa::where('hari', $hari)->firstOrFail();
        
        // 2. Cek apakah aktivitas ini sudah diselesaikan oleh pengguna
        $isCompleted = ActivityUser::where('user_id', Auth::id())
                                   ->where('kategori', 'dewasa') // Spesifik untuk dewasa
                                   ->where('hari', $hari)
                                   ->exists();
        
        // 3. Kirim data aktivitas DAN status selesai ke view
        return view('program.dewasa.show', [
            'activity' => $activity,
            'isCompleted' => $isCompleted // Kirim variabel ini ke view
        ]);
    }
}