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
            'Kesehatan', 'Peregangan Rutin', 'Jalan Pagi', 'Jalan Santai', 'Yoga',
            'Push-Up', 'Plank', 'Skipping', 'Mountain Climber', 'Jogging',
            'Zumba', 'Stretching', 'Strength Training', 'Core Workout', 'Cycling',
            'Dance', 'Swimming', 'Hiking', 'Tai Chi', 'Pilates',
            'Boxing', 'Squats', 'Lunges', 'Bodyweight Exercise', 'Jumping Jacks',
            'Crunches', 'Jump Rope', 'Burpees', 'Running', 'Weightlifting', 'Resistance Bands'
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
