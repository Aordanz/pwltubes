<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LansiaActivityController extends Controller
{
    public function show($id)
    {
        $activities = [
            ['Plank', 'Jogging'],
            ['Squats', 'Yoga'],
            ['Rest Day', 'Rest Day'],
            ['Push-up', 'Walking'],
            ['Stretching', 'Lunges'],
            ['Jogging', 'Tai Chi'],
            ['Dance', 'Strength Training'],
            ['Burpees', 'Pilates'],
            ['Rest Day', 'Rest Day'],
            ['Zumba', 'Sit-up'],
            ['Yoga', 'Push-up'],
            ['Cycling', 'Swimming'],
            ['Brisk Walk', 'Plank'],
            ['Boxing', 'Stretching'],
            ['Rest Day', 'Rest Day'],
            ['Squats', 'Breathing'],
            ['Jump Rope', 'Walking'],
            ['Plank', 'Yoga'],
            ['Running', 'Pilates'],
            ['Bodyweight Squats', 'Wall Sit'],
            ['Lunges', 'Jogging'],
            ['Rest Day', 'Rest Day'],
            ['Push-up', 'Stretching'],
            ['Cycling', 'Jogging'],
            ['Yoga', 'Crunches'],
            ['Jumping Jacks', 'Breathing'],
            ['Mountain Climber', 'Wall Sit'],
            ['Rest Day', 'Rest Day'],
            ['Tai Chi', 'Sit-up'],
            ['Strength Training', 'Plank'],
        ];

        if ($id < 1 || $id > count($activities)) {
            abort(404);
        }

        [$morning, $evening] = $activities[$id - 1];

        return view('activity.show', compact('id', 'morning', 'evening'));
    }
}
