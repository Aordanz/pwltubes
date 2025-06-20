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
        $user = Auth::user();

        // Ambil semua dokter untuk ditampilkan di UI
        $doctors = Doctor::all();

        return view('chat.index', compact('doctors'));
    }

    public function send(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'receiver_id'   => 'required|integer|exists:doctors,id',
            'receiver_type' => 'required|in:doctor',
            'content'       => 'required|string|max:1000',
        ]);

        $message = Message::create([
            'sender_id'     => $user->id,
            'sender_type'   => 'user',
            'receiver_id'   => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'content'       => $request->content,
        ]);

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function fetch(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'receiver_id'   => 'required|integer|exists:doctors,id',
            'receiver_type' => 'required|in:doctor',
        ]);

        // Ambil semua pesan antara user dan dokter tertentu
        $messages = Message::where(function ($q) use ($user, $request) {
            $q->where('sender_id', $user->id)
              ->where('sender_type', 'user')
              ->where('receiver_id', $request->receiver_id)
              ->where('receiver_type', $request->receiver_type);
        })->orWhere(function ($q) use ($user, $request) {
            $q->where('sender_id', $request->receiver_id)
              ->where('sender_type', $request->receiver_type)
              ->where('receiver_id', $user->id)
              ->where('receiver_type', 'user');
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }
}
