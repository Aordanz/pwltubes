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
        
            'Latihan Peregangan', 'Latihan Energi', 'Latihan Kekuatan', 'Rest Day',
    'Latihan Semangat', 'Latihan Kardio', 'Latihan Kelincahan', 'Rest Day',
    'Latihan Inti Tubuh', 'Latihan Stamina', 'Latihan Kelenturan', 'Rest Day',
    'Latihan Gerak Tubuh', 'Latihan Keseimbangan', 'Latihan Kebugaran', 'Rest Day',
    'Latihan Harian', 'Latihan Ketahanan', 'Latihan Fisik', 'Rest Day',
    'Latihan Otot', 'Latihan Ritme Tubuh', 'Latihan Stabilitas', 'Rest Day',
    'Latihan Kecepatan', 'Latihan Koordinasi', 'Latihan Daya Tahan', 'Rest Day',
    'Latihan Fokus', 'Latihan Gerak Aktif', 'Rest Day'
        ];
         return view('program.dewasa', compact('activities'));

    }

    public function lansia()
    {
        $activities = [
        'Kesehatan Jantung', 'Peregangan Tubuh', 'Keseimbangan dan Stabilitas', 'Rest Day', 'Fleksibilitas Tubuh',
            'Kekuatan Tubuh Atas', 'Koordinasi Motorik', 'Rest Day', 'Latihan Sendi', 'Pernapasan dan Relaksasi',
            'Kesehatan Otak', 'Rest Day', 'Daya Tahan', 'Postur Tubuh', 'Latihan Seluruh Tubuh',
            'Rest Day', 'Mobilitas Harian', 'Kesehatan Mata & Leher	', 'Refleksi & Keseimbangan', 'Rest Day',
            'Senam Pagi & Pernafasan', 'Stimulasi Refleks', 'Menjaga Mobilitas', 'Rest Day', 'Kekuatan Tubuh Bagian Bawah',
            'Fokus dan Daya Ingat', 'Gerakan Sehari-hari', 'Rest Day', 'Kesehatan Emosional', 'Peregangan Malam', 'Evaluasi & Syukur'
        ];
         return view('program.lansia', compact('activities'));;
    }
    
}
