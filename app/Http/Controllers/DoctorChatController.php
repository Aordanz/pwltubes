<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorChatController extends Controller
{
    public function __construct()
    {
        // Gunakan middleware auth agar hanya user login (dokter) yang bisa akses
        $this->middleware('auth');
    }

    public function index()
    {
        $doctor = Auth::user();

        // Cek apakah yang login adalah dokter
        if (!$doctor || $doctor->role !== 'doctor') {
            abort(403, 'Akses ditolak: Anda bukan dokter.');
        }

        // Ambil semua pesan yang melibatkan dokter (baik sebagai pengirim maupun penerima)
        $messages = Message::where(function ($q) use ($doctor) {
            $q->where('sender_id', $doctor->id)->where('sender_type', 'doctor');
        })->orWhere(function ($q) use ($doctor) {
            $q->where('receiver_id', $doctor->id)->where('receiver_type', 'doctor');
        })->orderBy('created_at')->get();

        // Ambil semua user untuk ditampilkan sebagai penerima chat
        $users = User::where('role', 'user')->get();

        return view('doctor.chat', compact('messages', 'users'));
    }

    public function send(Request $request)
    {
        $doctor = Auth::user();

        if (!$doctor || $doctor->role !== 'doctor') {
            abort(403, 'Akses ditolak: Anda bukan dokter.');
        }

        // Validasi input dari form chat
        $request->validate([
            'receiver_id'   => 'required|integer|exists:users,id',
            'receiver_type' => 'required|in:user',
            'content'       => 'required|string|max:1000',
        ]);

        // Simpan pesan ke tabel messages
        Message::create([
            'sender_id'     => $doctor->id,
            'sender_type'   => 'doctor',
            'receiver_id'   => $request->receiver_id,
            'receiver_type' => $request->receiver_type,
            'content'       => $request->content,
        ]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
