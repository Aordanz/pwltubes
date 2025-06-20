<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityUser;

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

        $completedDays = ActivityUser::where('user_id', auth()->id())
            ->where('kategori', 'remaja')
            ->pluck('hari')
            ->toArray();

        return view('program.remaja', [
            'activities' => $activities,
            'kategori' => 'remaja',
            'completedDays' => $completedDays,
        ]);
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

        $completedDays = ActivityUser::where('user_id', auth()->id())
            ->where('kategori', 'dewasa')
            ->pluck('hari')
            ->toArray();

        return view('program.dewasa', [
            'activities' => $activities,
            'kategori' => 'dewasa',
            'completedDays' => $completedDays,
        ]);
    }

    public function lansia()
    {
        $activities = [
            'Kesehatan Jantung', 'Peregangan Tubuh', 'Keseimbangan dan Stabilitas', 'Rest Day',
            'Fleksibilitas Tubuh', 'Kekuatan Tubuh Atas', 'Koordinasi Motorik', 'Rest Day',
            'Latihan Sendi', 'Pernapasan dan Relaksasi', 'Kesehatan Otak', 'Rest Day',
            'Daya Tahan', 'Postur Tubuh', 'Latihan Seluruh Tubuh', 'Rest Day',
            'Mobilitas Harian', 'Kesehatan Mata & Leher', 'Refleksi & Keseimbangan', 'Rest Day',
            'Senam Pagi & Pernafasan', 'Stimulasi Refleks', 'Menjaga Mobilitas', 'Rest Day',
            'Kekuatan Tubuh Bagian Bawah', 'Fokus dan Daya Ingat', 'Gerakan Sehari-hari', 'Rest Day',
            'Kesehatan Emosional', 'Peregangan Malam', 'Evaluasi & Syukur'
        ];

        $completedDays = ActivityUser::where('user_id', auth()->id())
            ->where('kategori', 'lansia')
            ->pluck('hari')
            ->toArray();

        return view('program.lansia', [
            'activities' => $activities,
            'kategori' => 'lansia',
            'completedDays' => $completedDays,
        ]);
    }

    public function tandaiTerpenuhi(Request $request)
    {
        $user = auth()->user();
        $hari = $request->input('hari');
        $kategori = $request->input('kategori');

        $exists = ActivityUser::where('user_id', $user->id)
            ->where('hari', $hari)
            ->where('kategori', $kategori)
            ->exists();

        if (! $exists) {
            ActivityUser::create([
                'user_id' => $user->id,
                'hari' => $hari,
                'kategori' => $kategori,
            ]);
        }

        return response()->json(['success' => true]);
    }
}
