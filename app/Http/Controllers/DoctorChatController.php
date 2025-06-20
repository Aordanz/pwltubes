<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class DoctorChatController extends Controller
{
    public function __construct()
    {
        // Gunakan middleware 'auth' karena dokter login via form login biasa
        $this->middleware('auth');
    }

    public function index()
    {
        $doctor = auth()->user();

        // Pastikan role-nya adalah 'doctor'
        if (!$doctor || $doctor->role !== 'doctor') {
            abort(403, 'Anda bukan dokter');
        }

        // Ambil semua pesan yang berkaitan dengan dokter
        $messages = Message::where(function ($q) use ($doctor) {
            $q->where('sender_id', $doctor->id)->where('sender_type', 'doctor');
        })->orWhere(function ($q) use ($doctor) {
            $q->where('receiver_id', $doctor->id)->where('receiver_type', 'doctor');
        })->orderBy('created_at')->get();

        // Ambil semua user untuk dikirimi pesan
        $users = User::where('role', 'user')->get();

        return view('doctor.chat', compact('messages', 'users'));
    }

    public function send(Request $request)
    {
        $doctor = auth()->user();

        if (!$doctor || $doctor->role !== 'doctor') {
            abort(403, 'Akses ditolak');
        }

        // Validasi form
        $request->validate([
            'receiver_id' => 'required|integer|exists:users,id',
            'receiver_type' => 'required|in:user',
            'content' => 'required|string|max:1000',
        ]);

        // Simpan pesan ke database
        Message::create([
            'sender_id' => $doctor->id,
            'sender_type' => 'doctor',
            'receiver_id' => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'content' => $request->content
        ]);

        return back()->with('success', 'Pesan berhasil dikirim');
    }
}
