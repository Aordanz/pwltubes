<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    public function fetch(Request $request)
    {
        return Message::where('sender', $request->mentor)
                      ->orWhere('receiver', $request->mentor)
                      ->orderBy('created_at')
                      ->get();
    }

    public function store(Request $request)
    {
        return Message::create([
            'sender' => 'user',
            'receiver' => $request->mentor,
            'message' => $request->message,
        ]);
    }
}
