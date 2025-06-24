<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AktivitasRemaja; // Panggil model yang benar

class RemajaActivityController extends Controller
{
    // Method sekarang menerima $hari, bukan $id
    public function show($hari)
    {
        // Cari aktivitas berdasarkan kolom 'hari', bukan 'id'
        // firstOrFail() akan menampilkan error 404 jika tidak ditemukan
        $activity = AktivitasRemaja::where('hari', $hari)->firstOrFail();
        
        // Kirim data ke view show.blade.php
        return view('program.remaja.show', [
            'activity' => $activity
        ]);
    }
}