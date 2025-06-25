<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewChatMessage; // <-- PASTIKAN EVENT DI-IMPORT
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorChatController extends Controller
{
    /**
     * Pastikan semua metode di controller ini hanya bisa diakses
     * oleh pengguna yang sudah login dan memiliki role 'doctor'.
     */
    /**
     * Menampilkan halaman utama chat dokter.
     * Metode ini HANYA mengambil daftar pengguna yang pernah berinteraksi dengan dokter.
     */
    public function index()
    {
        $doctorId = Auth::id();

        // 1. Ambil ID pengguna yang mengirim pesan KE dokter
        $senderIds = Message::where('receiver_id', $doctorId)
                            ->where('sender_type', 'user')
                            ->distinct()
                            ->pluck('sender_id');

        // 2. Ambil ID pengguna yang DIKIRIMI pesan OLEH dokter
        $receiverIds = Message::where('sender_id', $doctorId)
                              ->where('sender_type', 'doctor')
                              ->distinct()
                              ->pluck('receiver_id');
        
        // 3. Gabungkan semua ID unik tersebut
        $userIds = $senderIds->merge($receiverIds)->unique();

        // 4. Ambil data lengkap dari para pengguna tersebut untuk ditampilkan di daftar percakapan
        $conversations = User::whereIn('id', $userIds)->get();

        // 5. Kirim hanya daftar percakapan ke view. Riwayat chat akan diambil via AJAX.
        return view('doctor.chat', compact('conversations'));
    }

    /**
     * Mengambil riwayat pesan untuk satu pengguna spesifik.
     * Metode ini dipanggil oleh JavaScript (AJAX/Fetch) saat dokter mengklik sebuah percakapan.
     */
    public function fetchMessagesForDoctor($userId)
    {
        $doctorId = Auth::id();

        $messages = Message::where(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $userId)->where('receiver_id', $doctorId);
        })->orWhere(function ($query) use ($userId, $doctorId) {
            $query->where('sender_id', $doctorId)->where('receiver_id', $userId);
        })
        ->orderBy('created_at', 'asc')
        ->get();
        
        // Laravel akan otomatis mengubah collection ini menjadi JSON
        return $messages;
    }

    public function sendMessage(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|integer',
        'content'     => 'required|string',
    ]);

    $message = Message::create([
        'sender_id'     => Auth::id(),
        'sender_type'   => 'doctor',
        'receiver_id'   => $request->receiver_id,
        'receiver_type' => 'user',
        'content'       => $request->content,
    ]);

    broadcast(new NewChatMessage($message))->toOthers();

    return response()->json(['status' => 'Message sent successfully']);
}

}