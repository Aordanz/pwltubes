<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DewasaActivityController extends Controller
{
    public function show($id)
    {
        $activities = [
            ['Jogging Pagi 20 Menit', 'Jalan Sore Keliling Perumahan'],
            ['Senam Pagi Bertenaga', 'Yoga Sore yang Menenangkan'],
            ['Latihan Otot Bagian Atas', 'Peregangan Ringan'],
            ['Hari Istirahat', 'Hari Istirahat'],
            ['Peregangan Seluruh Tubuh', 'Main Bulu Tangkis Santai'],
            ['Latihan Kardio Pagi', 'Jalan Cepat di Sore Hari'],
            ['Latihan Otot Kaki', 'Senam HIIT Ringan'],
            ['Hari Istirahat', 'Hari Istirahat'],
            ['Push-up dan Sit-up', 'Main Sepak Bola atau Basket'],
            ['Jalan Pagi 3 Kilometer', 'Yoga untuk Kelenturan Tubuh'],
            ['Latihan Inti (Perut & Punggung)', 'Senam Berirama'],
            ['Hari Istirahat', 'Hari Istirahat'],
            ['Senam Aerobik Pagi', 'Naik Turun Tangga Selama 10 Menit'],
            ['Latihan Beban dengan Berat Badan Sendiri', 'Jalan Sore Santai'],
            ['Jogging Pagi Hari', 'Bersepeda Selama 30 Menit'],
            ['Hari Istirahat', 'Hari Istirahat'],
            ['Functional Training', 'Senam Kardio Sore'],
            ['Peregangan Dinamis', 'Zumba Sore Menyenangkan'],
            ['Jalan Pagi ke Kantor atau Pasar', 'Bersepeda Sore Hari'],
            ['Hari Istirahat', 'Hari Istirahat'],
            ['Senam Pagi di Luar Ruangan', 'Latihan HIIT Singkat'],
            ['Latihan Inti Tubuh', 'Jalan Kaki Bersama Teman'],
            ['Latihan Kekuatan (Resistance Band)', 'Latihan Mobilitas Sendi'],
            ['Hari Istirahat', 'Hari Istirahat'],
            ['Jogging Ringan Pagi', 'Senam Ritmis Ringan'],
            ['Peregangan Aktif Pagi', 'Latihan Menjaga Keseimbangan'],
            ['Latihan Sirkuit Pagi', 'Main Bola Voli atau Futsal'],
            ['Hari Istirahat', 'Hari Istirahat'],
            ['Latihan Interval Pagi', 'Stretching dan Relaksasi'],
            ['Latihan Punggung dan Dada', 'Bersepeda Keliling Sekitar Rumah'],
            ['Hari Istirahat', 'Hari Istirahat']
        ];

        if ($id < 1 || $id > count($activities)) {
            abort(404);
        }

        [$morning, $evening] = $activities[$id - 1];

        return view('activity.show', compact('id', 'morning', 'evening'));
    }
}
