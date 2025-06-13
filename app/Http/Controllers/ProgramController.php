<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function remaja()
    {
        $activities = [
            'Kesehatan ', 'Peregangan Rutin', 'Latihan Kardio', 'Jalan Santai', 'Yoga',
            'Latihan Otot Lengan', 'Meditasi', 'Latihan Bahu', 'Latihan Kardio', 'Jogging',
            'Jalan Sehat', 'Stretching', 'Refleksi', 'Core Workout', 'Cycling',
            'Dance', 'Swimming', 'Hiking', 'Tai Chi', 'Pilates',
            'Boxing', 'Squats', 'Lunges', 'Bodyweight Exercise', 'Jumping Jacks',
            'Crunches', 'Jump Rope', 'Burpees', 'Running', 'Weightlifting', 'Resistance Bands'
        ];
        $statusLatihan = session('latihan_terpenuhi.remaja', []);

return view('program.remaja', compact('activities', 'statusLatihan'));
    }

    public function dewasa()
    {
        $activities = [
            'Point Up', 'Peregangan Rutin', 'Latihan Kardio', 'Jalan Santai', 'Yoga',
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
        return view('program.lansia');
    }
    
}
