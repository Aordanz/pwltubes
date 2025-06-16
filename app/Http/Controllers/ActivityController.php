<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function show($id)
{
    // Daftar aktivitas selama 30 hari (contoh)
    $activities = [
    ['Yoga', 'Jogging'],                    // Hari 1
    ['Push-up', 'Stretching'],              // Hari 2
    ['Rest Day', 'Rest Day'],               // Hari 3
    ['Jumping Jacks', 'Plank'],             // Hari 4
    ['Bodyweight Squats', 'Lunges'],        // Hari 5
    ['Yoga', 'Stretching'],                 // Hari 6
    ['Jogging', 'Brisk Walk'],              // Hari 7
    ['Push-up', 'Sit-up'],                  // Hari 8
    ['Rest Day', 'Rest Day'],               // Hari 9
    ['High Knees', 'Side Plank'],           // Hari 10
    ['Squats', 'Mountain Climbers'],        // Hari 11
    ['Stretching', 'Breathing Exercise'],   // Hari 12
    ['Jogging', 'Plank'],                   // Hari 13
    ['Push-up', 'Wall Sit'],                // Hari 14
    ['Yoga', 'Walking'],                    // Hari 15
    ['Lunges', 'Sit-up'],                   // Hari 16
    ['Rest Day', 'Rest Day'],               // Hari 17
    ['Jump Rope', 'Stretching'],            // Hari 18
    ['Push-up', 'Yoga'],                    // Hari 19
    ['Jogging', 'Breathing Exercise'],      // Hari 20
    ['Bodyweight Squats', 'Stretching'],    // Hari 21
    ['Rest Day', 'Rest Day'],               // Hari 22
    ['Plank', 'Brisk Walk'],                // Hari 23
    ['Push-up', 'Jumping Jacks'],           // Hari 24
    ['Yoga', 'Sit-up'],                     // Hari 25
    ['Jogging', 'Lunges'],                  // Hari 26
    ['Stretching', 'Wall Sit'],             // Hari 27
    ['Rest Day', 'Rest Day'],               // Hari 28
    ['Squats', 'Push-up'],                  // Hari 29
    ['Breathing Exercise', 'Stretching'],   // Hari 30
];

    if ($id < 1 || $id > count($activities)) {
        abort(404);
    }

    // Ambil dua aktivitas untuk hari ke-$id
    [$morning, $evening] = $activities[$id - 1];

    return view('activity.show', compact('id', 'morning', 'evening'));
}

}
