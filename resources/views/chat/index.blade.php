@extends('layouts.layout')

@section('title', 'Chat User-Admin')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded mt-10">
    <h1 class="text-2xl font-semibold mb-6">Chat dengan Admin</h1>

    <div class="border rounded p-4 h-96 overflow-y-auto mb-6 bg-gray-50" id="chatBox">
        @foreach ($messages as $msg)
            @php
                $isUser = $msg->sender_id === auth()->id();
            @endphp
            <div class="mb-4 flex {{ $isUser ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-xs px-4 py-2 rounded-lg
                    {{ $isUser ? 'bg-green-200 text-green-900' : 'bg-gray-300 text-gray-900' }}">
                    <p>{{ $msg->message }}</p>
                    <span class="text-xs text-gray-600 block mt-1">{{ $msg->created_at->format('d M H:i') }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send') }}" method="POST" class="flex space-x-4">
        @csrf
        <input type="text" name="message" placeholder="Tulis pesan..." 
               class="flex-grow border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
        <button type="submit" 
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Kirim</button>
    </form>
</div>

<script>
    let chatBox = document.getElementById('chatBox');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>
@endsection
