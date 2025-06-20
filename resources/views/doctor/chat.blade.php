<!-- resources/views/doctor/chat.blade.php -->

@extends('layouts.layout_doctor')

@section('content')
<div class="container mx-auto mt-8 max-w-3xl">
    <h1 class="text-2xl font-bold mb-6">Dashboard Chat Dokter</h1>

    @if (session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Chat Box -->
    <div class="bg-white p-4 rounded shadow h-[400px] overflow-y-scroll mb-4" id="chat-box">
        @foreach($messages as $message)
            <div class="mb-3">
                <div class="text-sm {{ $message->sender_type === 'doctor' ? 'text-blue-600' : 'text-gray-800' }}">
                    <strong>{{ $message->sender_type === 'doctor' ? 'Anda' : 'User #' . $message->sender_id }}:</strong>
                </div>
                <div class="bg-gray-100 p-2 rounded text-sm">{{ $message->content }}</div>
                <div class="text-xs text-gray-500 mt-1">{{ $message->created_at->format('H:i d/m/Y') }}</div>
            </div>
        @endforeach
    </div>

    <!-- Kirim Pesan -->
    <form action="{{ route('doctor.chat.send') }}" method="POST" class="flex items-center space-x-2">
        @csrf
        <input type="hidden" name="receiver_type" value="user">
        <input type="number" name="receiver_id" placeholder="ID User" required
               class="border p-2 rounded w-24">
        <input type="text" name="content" placeholder="Ketik pesan..." required
               class="border p-2 rounded flex-1">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Kirim
        </button>
    </form>
</div>

<script>
    // Scroll otomatis ke bawah saat halaman dimuat
    const chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>
@endsection
