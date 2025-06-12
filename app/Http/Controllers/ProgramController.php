<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function remaja()
    {
        $activities = [
            'Point', 'Peregangan Rutin', 'Latihan Kardio', 'Jalan Santai', 'Yoga',
            'Push-Up', 'Plank', 'Skipping', 'Mountain Climber', 'Jogging',
            'Zumba', 'Stretching', 'Strength Training', 'Core Workout', 'Cycling',
            'Dance', 'Swimming', 'Hiking', 'Tai Chi', 'Pilates',
            'Boxing', 'Squats', 'Lunges', 'Bodyweight Exercise', 'Jumping Jacks',
            'Crunches', 'Jump Rope', 'Burpees', 'Running', 'Weightlifting', 'Resistance Bands'
        ];
        return view('program.remaja', compact('activities'));
    }

    public function dewasa()
    {
        return view('program.dewasa');
    }

    public function lansia()
    {
        return view('program.lansia');
    }
}
