@extends('layouts.layout')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white shadow p-6 rounded">
    <h2 class="text-xl font-bold mb-4">Chat dengan Dokter</h2>
    
    <select id="doctorSelect" class="border p-2 rounded mb-4 w-full">
        <option value="">Pilih Dokter</option>
        @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach
    </select>

    <div id="chatBox" class="h-64 border p-3 overflow-y-auto mb-4 bg-gray-100 rounded"></div>

    <div class="flex">
        <input type="text" id="messageInput" class="border rounded-l p-2 flex-1" placeholder="Tulis pesan...">
        <button onclick="sendMessage()" class="bg-blue-600 text-white px-4 rounded-r">Kirim</button>
    </div>
</div>

<script>
    let selectedDoctorId = null;

    document.getElementById('doctorSelect').addEventListener('change', function () {
        selectedDoctorId = this.value;
        fetchMessages();
    });

    function sendMessage() {
        const message = document.getElementById('messageInput').value;
        if (!selectedDoctorId || !message) return;

        fetch("{{ route('chat.send') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                receiver_id: selectedDoctorId,
                content: message
            })
        }).then(() => {
            document.getElementById('messageInput').value = '';
            fetchMessages();
        });
    }

    function fetchMessages() {
        if (!selectedDoctorId) return;

        fetch("{{ route('chat.fetch') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                receiver_id: selectedDoctorId
            })
        })
        .then(res => res.json())
        .then(data => {
            const chatBox = document.getElementById('chatBox');
            chatBox.innerHTML = '';
            data.forEach(msg => {
                chatBox.innerHTML += `
                    <div class="mb-1 ${msg.sender_type === 'user' ? 'text-right' : 'text-left'}">
                        <span class="inline-block px-3 py-1 rounded ${msg.sender_type === 'user' ? 'bg-blue-200' : 'bg-gray-300'}">
                            ${msg.content}
                        </span>
                    </div>
                `;
            });
            chatBox.scrollTop = chatBox.scrollHeight;
        });
    }

    setInterval(fetchMessages, 5000);
</script>
@endsection
