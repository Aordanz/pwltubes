<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function remaja()
    {
        $activities = [

            'Kesehatan ', 'Peregangan Rutin', 'Latihan Kardio', '', 'Yoga',
            'Latihan Otot ', 'Belajar', '', 'Latihan Otot', 'Jogging',
            'Senam Pagi', '', 'Sepedaan', 'Latihan Otot', 'Jalan Sehat',
            '', 'Belajar', 'Lari', 'Berenang', 'Belajar',
            'Latihan Otot', 'Membantu Orang Tua', 'Skill Baru', 'Latihan Otot', 'Lari',
            'Senam Pagi', 'Belajar Baik', '', 'Membantu Orang Tua', 'Latihan Otot', 'Refleksi Diri'

        ];
        return view('program.remaja', compact('activities'));
    }

    public function dewasa()
    {

        

        $activities = [
        'Peregangan', 'Energi', 'Kekuatan', 'Istirahat', 'Semangat', 'Kardio', 'Kelincahan', 'Istirahat', 
        'Inti', 'Stamina', 'Fleksibilitas', 'Istirahat', 'Gerak', 'Keseimbangan', 'Kebugaran', 'Istirahat',
        'Latihan', 'Ketahanan', 'Tantangan', 'Istirahat', 'Kekuatan', 'Ritme', 'Stabilitas', 'Istirahat', 
        'Kecepatan', 'Koordinasi', 'Daya Tahan', 'Istirahat', 'Fokus', 'Gerak Aktif', 'Istirahat',

        ];
         return view('program.dewasa', compact('activities'));

    }

    public function lansia()
    {
        $activities = [
        'Kesehatan ', 'Peregangan Rutin', 'Latihan Kardio', '', 'Yoga',
            'Latihan Otot ', 'Belajar', '', 'Latihan Otot', 'Jogging',
            'Senam Pagi', '', 'Sepedaan', 'Latihan Otot', 'Jalan Sehat',
            '', 'Belajar', 'Lari', 'Berenang', 'Belajar',
            'Latihan Otot', 'Membantu Orang Tua', 'Skill Baru', 'Latihan Otot', 'Lari',
            'Senam Pagi', 'Belajar Baik', '', 'Membantu Orang Tua', 'Latihan Otot', 'Refleksi Diri'
        ];
         return view('program.lansia', compact('activities'));;
    }
    
}
