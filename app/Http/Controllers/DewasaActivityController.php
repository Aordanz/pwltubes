<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DewasaActivityController extends Controller
{
    public function show($id)
    {
        $activities = [
            ['Jogging Pagi 20 Menit', 'Jalan Sore Keliling Kompleks'],
            ['Senam Pagi Enerjik', 'Yoga Sore'],
            ['Latihan Otot Tubuh Bagian Atas', 'Stretching Ringan'],
            ['Rest Day', 'Rest Day'],
            ['Peregangan Seluruh Tubuh', 'Main Badminton Santai'],
            ['Latihan Kardio Pagi', 'Jalan Cepat Sore'],
            ['Latihan Otot Kaki', 'Senam HIIT Ringan'],
            ['Rest Day', 'Rest Day'],
            ['Push-up & Sit-up', 'Main Sepakbola / Basket'],
            ['Jalan Pagi 3 Km', 'Yoga untuk Fleksibilitas'],
            ['Latihan Core (Perut & Punggung)', 'Senam Musik'],
            ['Rest Day', 'Rest Day'],
            ['Senam Aerobik', 'Naik Turun Tangga 10 Menit'],
            ['Latihan Beban Tubuh Sendiri', 'Jalan Santai Sore'],
            ['Jogging Pagi', 'Bersepeda 30 Menit'],
            ['Rest Day', 'Rest Day'],
            ['Latihan Functional Training', 'Senam Kardio'],
            ['Stretching Dinamis', 'Zumba Sore'],
            ['Jalan Pagi ke Kantor / Pasar', 'Bersepeda Sore'],
            ['Rest Day', 'Rest Day'],
            ['Senam Pagi Outdoor', 'Latihan HIIT Pendek'],
            ['Latihan Otot Inti', 'Jalan Kaki Bareng Teman'],
            ['Latihan Kekuatan (Resistance Band)', 'Latihan Mobilitas Sendi'],
            ['Rest Day', 'Rest Day'],
            ['Jogging Ringan', 'Senam Ringan Berirama'],
            ['Peregangan Aktif', 'Latihan Keseimbangan (Balance)'],
            ['Latihan Sirkuit Pagi', 'Bermain Bola Voli / Futsal'],
            ['Rest Day', 'Rest Day'],
            ['Latihan Selang (Interval Training)', 'Stretching & Relaksasi'],
            ['Latihan Punggung & Dada', 'Bersepeda di Lingkungan'],
            ['Rest Day', 'Rest Day']
        ];

        if ($id < 1 || $id > count($activities)) {
            abort(404);
        }

        [$morning, $evening] = $activities[$id - 1];

        return view('activity.show', compact('id', 'morning', 'evening'));
    }
}
