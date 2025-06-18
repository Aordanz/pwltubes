<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemajaActivityController extends Controller
{
    public function show($id)
    {
        // Aktivitas pagi dan malam selama 30 hari untuk kategori remaja
        $activities = [
            ['Peregangan Tubuh', 'Belajar'],
            ['Jogging', 'Membantu Orang Tua'],
            ['Rest Day', 'Rest Day'],
            ['Senam Pagi', 'Belajar'],
            ['Latihan Otot', 'Skill Baru'],
            ['Yoga', 'Latihan Kardio'],
            ['Jogging', 'Belajar'],
            ['Belajar', 'Membantu Orang Tua'],
            ['Rest Day', 'Rest Day'],
            ['Latihan Otot', 'Sepedaan'],
            ['Senam Pagi', 'Latihan Otot'],
            ['Belajar', 'Lari'],
            ['Yoga', 'Jalan Sehat'],
            ['Latihan Kardio', 'Skill Baru'],
            ['Belajar', 'Refleksi Diri'],
            ['Latihan Otot', 'Jogging'],
            ['Rest Day', 'Rest Day'],
            ['Sepedaan', 'Belajar'],
            ['Lari', 'Latihan Otot'],
            ['Membantu Orang Tua', 'Senam Pagi'],
            ['Skill Baru', 'Latihan Kardio'],
            ['Latihan Otot', 'Jalan Sehat'],
            ['Rest Day', 'Rest Day'],
            ['Latihan Kardio', 'Belajar'],
            ['Senam Pagi', 'Membantu Orang Tua'],
            ['Jogging', 'Refleksi Diri'],
            ['Latihan Otot', 'Latihan Kardio'],
            ['Rest Day', 'Rest Day'],
            ['Belajar', 'Latihan Otot'],
            ['Jalan Sehat', 'Refleksi Diri'],
        ];

        if ($id < 1 || $id > count($activities)) {
            abort(404);
        }

        [$morning, $evening] = $activities[$id - 1];

        return view('activity.show', compact('id', 'morning', 'evening'));
    }
}
