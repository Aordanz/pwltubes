<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('chat.index', compact('doctors'));
    }

    public function send(Request $request)
    {
        $user = Auth::user();

        $message = Message::create([
            'sender_id'     => $user->id,
            'sender_type'   => 'user',
            'receiver_id'   => $request->receiver_id,
            'receiver_type' => 'doctor',
            'content'       => $request->content
        ]);

        return response()->json($message);
    }

    public function fetch(Request $request)
    {
        $user = Auth::user();

        $messages = Message::where(function ($q) use ($user, $request) {
            $q->where('sender_id', $user->id)
              ->where('receiver_id', $request->receiver_id)
              ->where('sender_type', 'user')
              ->where('receiver_type', 'doctor');
        })->orWhere(function ($q) use ($user, $request) {
            $q->where('sender_id', $request->receiver_id)
              ->where('receiver_id', $user->id)
              ->where('sender_type', 'doctor')
              ->where('receiver_type', 'user');
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }
}
