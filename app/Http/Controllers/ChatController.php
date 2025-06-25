<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewChatMessage;
use App\Models\Message; // Ganti dengan App\Models\ChatMessage jika Anda menggunakan nama itu
use Illuminate\Support\Facades\Auth;
use App\Events\MessageDeleted;
use App\Events\MessageEdited; 
class ChatController extends Controller
{
    /**
     * Mengambil riwayat pesan antara pengguna yang login dan seorang mentor/dokter.
     */
    public function fetchMessages(Request $request, $mentorId)
    {
        $userId = Auth::id();

        // Query ini lebih aman dan akurat
        // Mengambil pesan HANYA antara dua pihak ini
        return Message::where(function ($query) use ($userId, $mentorId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $mentorId);
        })->orWhere(function ($query) use ($userId, $mentorId) {
            $query->where('sender_id', $mentorId)
                  ->where('receiver_id', $userId);
        })
        ->orderBy('created_at', 'asc')
        ->get();
    }

    /**
     * Menyimpan pesan baru dan menyiarkannya (broadcast).
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|integer', // ID dokter/mentor
            'content'     => 'required|string',
        ]);

        // Buat pesan baru dengan informasi pengirim yang benar
        $message = Message::create([
            'sender_id'     => Auth::id(),
            'sender_type'   => 'user', // Tipe pengirim adalah user
            'receiver_id'   => $request->receiver_id,
            'receiver_type' => 'doctor', // Asumsi penerima adalah dokter/mentor
            'content'       => $request->content,
        ]);

        // ==========================================================
        // INI BAGIAN PENTINGNYA: Menyiarkan event ke channel WebSocket
        // ==========================================================
        broadcast(new NewChatMessage($message))->toOthers();

        return response()->json(['status' => 'Message sent successfully']);
    }
    public function destroy(Message $message)
    {
        // KEAMANAN: Pastikan hanya pengirim pesan yang bisa menghapusnya.
        if (auth()->id() !== $message->sender_id) {
            return response()->json(['error' => 'Akses ditolak.'], 403);
        }

        // Tentukan channel name sebelum message dihapus
        $userId = $message->sender_type === 'user' ? $message->sender_id : $message->receiver_id;
        $doctorId = $message->sender_type === 'doctor' ? $message->sender_id : $message->receiver_id;
        $channelName = 'chat.' . $userId . '.' . $doctors;

        // Broadcast event bahwa pesan ini akan dihapus
        broadcast(new MessageDeleted($message->id, $channelName))->toOthers();

        // Hapus pesan dari database
        $message->delete();

        return response()->json(['success' => 'Pesan berhasil dihapus.']);
    }
     public function update(Request $request, Message $message)
    {
        // KEAMANAN: Pastikan hanya pengirim pesan yang bisa mengeditnya.
        if (auth()->id() !== $message->sender_id) {
            return response()->json(['error' => 'Akses ditolak.'], 403);
        }

        // Validasi konten baru
        $request->validate(['content' => 'required|string|max:1000']);

        // Update konten pesan di database
        $message->content = $request->content;
        $message->save();

        // Tentukan channel name
        $userId = $message->sender_type === 'user' ? $message->sender_id : $message->receiver_id;
        $doctorId = $message->sender_type === 'doctor' ? $message->sender_id : $message->receiver_id;
        $channelName = 'chat.' . $userId . '.' . $doctorId;

        // Broadcast event bahwa pesan ini telah diubah
        broadcast(new MessageEdited($message, $channelName))->toOthers();

        return response()->json(['success' => 'Pesan berhasil diperbarui.', 'message' => $message]);
    }

}