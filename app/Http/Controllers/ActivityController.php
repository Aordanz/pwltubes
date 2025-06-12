<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    // Menampilkan halaman aktivitas berdasarkan ID
    public function show($id)
    {
        // Data aktivitas, bisa Anda sesuaikan dengan kebutuhan
        $activities = [
            'Yoga', 'Jogging', 'Push-up', 'Rest Day', 
            'Cycling', 'Swimming', 'Rest Day', 'Running', 
            'Stretching', 'Rest Day' // dan seterusnya
        ];

        // Memastikan ID yang diterima valid
        if ($id < 1 || $id > count($activities)) {
            abort(404);  // Halaman tidak ditemukan jika ID tidak valid
        }

        // Mengambil aktivitas berdasarkan ID
        $activity = $activities[$id - 1];

        // Menampilkan halaman detail aktivitas
        return view('activity.show', compact('activity', 'id'));
    }
}
