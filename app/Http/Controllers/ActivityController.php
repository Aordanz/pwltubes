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
            'Kesehatan ', 'Peregangan Rutin', 'Latihan Kardio', 'Istirahat', 'Yoga',
            'Latihan Otot ', 'Belajar', 'Istirahat', 'Latihan Otot', 'Jogging',
            'Senam Pagi', 'Istirahat', 'Sepedaan', 'Latihan Otot', 'Jalan Sehat',
            'Istirahat', 'Belajar', 'Lari', 'Berenang', 'Istirahat',
            'Latihan Otot', 'Membantu Orang Tua', 'Skill Baru', 'Istirahat', 'Lari',
            'Senam Pagi', 'Belajar', 'Istirahat', 'Membantu Orang Tua', 'Latihan Otot', 'Refleksi Diri' // dan seterusnya
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


