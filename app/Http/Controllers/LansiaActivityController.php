<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AktivitasLansia;
use App\Models\ActivityUser;
use Illuminate\Support\Facades\Auth;

class LansiaActivityController extends Controller
{
    /**
     * Menampilkan detail aktivitas berdasarkan nomor hari.
     *
     * @param  string  $hari
     * @return \Illuminate\View\View
     */
    public function show($hari)
    {
        // ==========================================================
        // PERBAIKAN FINAL: Menggunakan metode pencarian yang lebih kuat
        // ==========================================================

        // 1. Ambil SEMUA aktivitas dari database.
        $allActivities = AktivitasLansia::all();

        $activity = null;
        // 2. Loop melalui setiap item dan bandingkan nilainya setelah dibersihkan
        foreach ($allActivities as $item) {
            // trim() akan menghapus spasi di awal dan akhir dari kedua nilai
            // sebelum membandingkannya. Ini menyelesaikan masalah data yang kotor.
            if (trim($item->hari) == trim($hari)) {
                $activity = $item;
                break; // Hentikan loop jika sudah ditemukan
            }
        }

        // 3. Jika setelah dicari tetap tidak ada, tampilkan 404 Not Found.
        if (!$activity) {
            abort(404);
        }
        
        // Cek status penyelesaian
        $isCompleted = ActivityUser::where('user_id', Auth::id())
                                   ->where('kategori', 'lansia')
                                   ->where('hari', $activity->hari)
                                   ->exists();
        
        return view('program.lansia.show', [
            'activity' => $activity,
            'isCompleted' => $isCompleted
        ]);
    }
}
