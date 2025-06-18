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
          'Peregangan Tubuh', 'Latih Tenaga', 'Latihan Kekuatan', 'Hari Istirahat', 'Semangat Sehat', 'Olahraga Jantung', 'Latihan Kelincahan',
    'Hari Istirahat', 'Latihan Inti Tubuh', 'Menambah Stamina', 'Latihan Kelenturan', 'Hari Istirahat', 'Aktivitas Fisik', 'Latihan Keseimbangan',
    'Kebugaran Tubuh', 'Hari Istirahat', 'Latihan Harian', 'Latihan Ketahanan', 'Tantangan Baru', 'Hari Istirahat', 'Menguatkan Otot',
    'Gerakan Berirama', 'Menjaga Postur Tubuh', 'Hari Istirahat', 'Gerakan Cepat dan Ringan', 'Latihan Koordinasi', 'Daya Tahan Tubuh',
    'Hari Istirahat', 'Fokus dan Konsentrasi', 'Aktivitas Sehari-hari', 'Hari Istirahat'

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
