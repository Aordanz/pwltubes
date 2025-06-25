@extends('layouts.layout')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-xl rounded-lg p-4">
                <h2 class="text-xl font-bold mb-4">Chat dengan {{ $doctor->name }}</h2>

                {{-- Chat box --}}
                <div id="chat-box" class="h-64 overflow-y-scroll border rounded p-3 bg-gray-50 mb-4">
                    {{-- Pesan akan dimuat lewat JavaScript --}}
                </div>

                {{-- Form Kirim Pesan --}}
                <form id="chat-form">
                    <input type="hidden" name="receiver_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="receiver_type" value="doctor">
                    <div class="flex gap-2">
                        <input id="chat-input" type="text" name="content" class="flex-1 border rounded px-3 py-2" placeholder="Ketik pesan..." required>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const chatBox = document.getElementById('chat-box');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');

    // Muat pesan tiap 3 detik
    function loadMessages() {
        fetch("{{ route('chat.get') }}")
            .then(res => res.json())
            .then(data => {
                chatBox.innerHTML = data.messages.map(msg => `
                    <p class="mb-2">
                        <span class="font-semibold">${msg.sender_name}:</span>
                        ${msg.content}
                    </p>
                `).join('');
                chatBox.scrollTop = chatBox.scrollHeight;
            });
    }

    loadMessages();
    setInterval(loadMessages, 3000);

    // Kirim pesan
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(chatForm);

        fetch("{{ route('chat.send') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(res => res.json())
        .then(() => {
            chatInput.value = '';
            loadMessages();
        });
    });
</script>
@endsection
