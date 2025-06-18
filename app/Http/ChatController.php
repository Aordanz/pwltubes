<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        Message::create([
            'user' => 'Anda', // jika login, ganti jadi: auth()->user()->name
            'mentor' => $request->mentor,
            'message' => $request->message
        ]);

        return response()->json(['status' => 'ok']);
    }

    public function get(Request $request)
    {
        $messages = Message::where('mentor', $request->mentor)
            ->orderBy('created_at', 'asc')
            ->get(['user', 'message']); // hanya kirim field yang dibutuhkan

        return response()->json($messages);
    }
}
