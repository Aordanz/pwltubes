<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chat.index', compact('users'));
    }

    public function show($id)
    {
        $receiver = User::findOrFail($id);
        $chats = Chat::where(function($q) use ($id) {
                        $q->where('sender_id', Auth::id())
                          ->where('receiver_id', $id);
                    })
                    ->orWhere(function($q) use ($id) {
                        $q->where('sender_id', $id)
                          ->where('receiver_id', Auth::id());
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

        return view('chat.show', compact('receiver', 'chats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        Chat::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }
}
