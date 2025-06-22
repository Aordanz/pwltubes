@extends('layouts.layout_doctor')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen pt-24 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto">
        <div class="flex h-[calc(100vh-8rem)] bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
            
            <div class="w-1/3 border-r border-gray-200 dark:border-gray-700 flex flex-col">
                <div class="p-4 border-b border-gray-200 dark:border-gray-700 sticky top-0 bg-white dark:bg-gray-800 z-10">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Percakapan</h2>
                </div>
                <ul class="flex-1 overflow-y-auto" id="conversation-list">
                    @forelse ($conversations as $user)
                        <li onclick="openChat({{ $user->id }}, '{{ $user->name }}', '{{ $user->photo ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=random' }}')"
                            class="flex items-center p-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 border-b border-gray-200 dark:border-gray-700 transition duration-150 ease-in-out" 
                            id="user-{{ $user->id }}">
                            
                            @if ($user->photo)
                                <img class="w-12 h-12 rounded-full object-cover mr-4 flex-shrink-0" src="{{ $user->photo }}" alt="{{ $user->name }}">
                            @else
                                <img class="w-12 h-12 rounded-full object-cover mr-4 flex-shrink-0" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random" alt="{{ $user->name }}">
                            @endif

                            <div class="flex-1 overflow-hidden">
                                <div class="flex justify-between items-center">
                                    <p class="font-semibold text-gray-800 dark:text-gray-100 truncate">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 flex-shrink-0 ml-2">{{ optional($user->latestMessage)->created_at?->diffForHumans() }}</p>
                                </div>
                                <p class="text-sm text-gray-500 dark:text-gray-400 truncate">
                                    {{ optional($user->latestMessage)->content ?? 'Klik untuk memulai chat...' }}
                                </p>
                            </div>
                        </li>
                    @empty
                        <li class="p-4 text-gray-500 dark:text-gray-400 text-center">Belum ada percakapan.</li>
                    @endforelse
                </ul>
            </div>

            <div class="w-2/3 flex flex-col bg-gray-50 dark:bg-gray-900">
                <div id="chat-header" class="flex items-center p-3 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
                    <p class="font-semibold text-gray-600 dark:text-gray-300">Pilih percakapan untuk memulai</p>
                </div>
                <div id="chat-box" class="flex-1 p-6 overflow-y-auto space-y-2"></div>
                <div id="chat-form-wrapper" class="p-4 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 hidden">
                    <div class="flex items-center space-x-3">
                        <input type="hidden" id="receiver_id_input">
                        <input type="text" id="chat_input" placeholder="Ketik balasan..." required
                               class="flex-1 bg-gray-100 dark:bg-gray-700 dark:text-gray-200 border-transparent rounded-full py-3 px-5 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <button onclick="sendMessage()" class="bg-blue-600 text-white rounded-full p-3 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 transition duration-150 ease-in-out">
                            <svg class="w-6 h-6 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- ========================================================== --}}
{{-- BLOK SCRIPT DENGAN PENAMBAHAN FITUR TANGGAL --}}
{{-- ========================================================== --}}
<script>
    let activeUserId = null;
    const currentDoctorId = {{ Auth::id() }};
    let lastMessageDate = null; // Variabel untuk melacak tanggal terakhir

    /**
     * Fungsi untuk memformat tanggal menjadi "Hari Ini", "Kemarin", atau tanggal lengkap.
     */
    function formatDateSeparator(date) {
        const today = new Date();
        const yesterday = new Date();
        yesterday.setDate(yesterday.getDate() - 1);

        today.setHours(0, 0, 0, 0);
        yesterday.setHours(0, 0, 0, 0);
        date.setHours(0, 0, 0, 0);

        if (today.getTime() === date.getTime()) {
            return 'Hari Ini';
        } else if (yesterday.getTime() === date.getTime()) {
            return 'Kemarin';
        } else {
            return date.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }
    }

    /**
     * Fungsi untuk menyisipkan pemisah tanggal ke dalam chat box.
     */
    function appendDateSeparator(date) {
        const chatBox = document.getElementById('chat-box');
        const dateString = formatDateSeparator(new Date(date));

        const separatorWrapper = document.createElement('div');
        separatorWrapper.className = 'flex justify-center my-4';
        
        const separator = document.createElement('span');
        separator.className = 'bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-xs font-semibold px-3 py-1 rounded-full';
        separator.innerText = dateString;
        
        separatorWrapper.appendChild(separator);
        chatBox.appendChild(separatorWrapper);
    }

    function formatTime(isoString) {
        if (!isoString) return '';
        const date = new Date(isoString);
        return date.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false });
    }

    /**
     * Fungsi appendMessage diperbarui untuk menyertakan logika tanggal.
     */
    function appendMessage(msg) {
        const chatBox = document.getElementById('chat-box');
        const msgDate = new Date(msg.created_at);
        
        if (!lastMessageDate || lastMessageDate.toDateString() !== msgDate.toDateString()) {
            appendDateSeparator(msg.created_at);
            lastMessageDate = msgDate;
        }

        const isDoctor = msg.sender_id === currentDoctorId;
        const messageWrapper = document.createElement('div');
        messageWrapper.className = `flex flex-col ${isDoctor ? 'items-end' : 'items-start'}`;
        const bubbleWrapper = document.createElement('div');
        bubbleWrapper.className = `flex items-end gap-2 ${isDoctor ? 'flex-row-reverse' : 'flex-row'}`;
        const bubbleDiv = document.createElement('div');
        bubbleDiv.className = `max-w-md p-3 rounded-2xl ${isDoctor ? 'bg-blue-600 text-white rounded-br-none' : 'bg-white dark:bg-gray-700 dark:text-gray-200 rounded-bl-none'}`;
        bubbleDiv.innerText = msg.content;
        
        if(!isDoctor) {
            const avatar = document.createElement('img');
            avatar.className = 'w-8 h-8 rounded-full object-cover';
            avatar.src = document.getElementById('chat-header').querySelector('img').src;
            bubbleWrapper.appendChild(avatar);
        }
        
        bubbleWrapper.appendChild(bubbleDiv);
        messageWrapper.appendChild(bubbleWrapper);

        const timeEl = document.createElement('p');
        timeEl.className = `text-xs text-gray-400 mt-1 ${isDoctor ? 'mr-2' : 'ml-10'}`;
        timeEl.innerText = formatTime(msg.created_at);
        messageWrapper.appendChild(timeEl);
        
        chatBox.appendChild(messageWrapper);
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    /**
     * Fungsi fetchMessages diperbarui untuk me-reset tanggal.
     */
    function fetchMessages(userId) {
        const chatBox = document.getElementById('chat-box');
        chatBox.innerHTML = '<p class="text-center text-gray-500">Memuat pesan...</p>';
        
        fetch(`/doctor/chat/fetch/${userId}`)
            .then(response => response.json())
            .then(messages => {
                chatBox.innerHTML = '';
                lastMessageDate = null; // Reset tanggal setiap membuka chat baru
                messages.forEach(msg => {
                    appendMessage(msg);

                });
            });
    }

    // --- Sisa fungsi JavaScript tidak diubah ---
    function openChat(userId, userName, userPhotoUrl) {
        activeUserId = userId;
        document.querySelectorAll('#conversation-list li').forEach(li => {
            li.classList.remove('bg-blue-50', 'dark:bg-gray-700', 'border-l-4', 'border-blue-500');
            li.classList.add('hover:bg-gray-100', 'dark:hover:bg-gray-700');
        });
        const activeLi = document.getElementById(`user-${userId}`);
        activeLi.classList.add('bg-blue-50', 'dark:bg-gray-700', 'border-l-4', 'border-blue-500');
        activeLi.classList.remove('hover:bg-gray-100', 'dark:hover:bg-gray-700');
        const dot = activeLi.querySelector('.notification-dot');
        if (dot) dot.remove();

        const chatHeader = document.getElementById('chat-header');
        chatHeader.innerHTML = `
            <img class="w-10 h-10 rounded-full object-cover" src="${userPhotoUrl}" alt="${userName}">
            <p class="ml-3 font-semibold text-gray-800 dark:text-gray-200">${userName}</p>
        `;
        
        document.getElementById('chat-form-wrapper').classList.remove('hidden');
        document.getElementById('receiver_id_input').value = userId;

        fetchMessages(userId);
        listenForMessages(userId);
    }

    function sendMessage() {
        const content = document.getElementById('chat_input').value;
        const receiverId = document.getElementById('receiver_id_input').value;
        if (!content.trim()) return;
        const temporaryMessage = { content: content, sender_id: currentDoctorId, created_at: new Date().toISOString() };
        appendMessage(temporaryMessage);
        fetch("{{ route('doctor.chat.send') }}", {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ receiver_id: receiverId, content: content })
        });
        document.getElementById('chat_input').value = '';
        document.getElementById('chat_input').focus();
    }
    
    function listenForMessages(userId) {
        if (window.Echo) {
            if(activeUserId && activeUserId !== userId) {
                window.Echo.leave(`chat.${activeUserId}.${currentDoctorId}`);
            }

            const channelName = `chat.${userId}.${currentDoctorId}`;
            window.Echo.private(channelName)
                .listen('.chat-message', (event) => {
                    if (event.message.sender_id == userId) {
                        appendMessage(event.message);
                    } else {
                        // ... logika notifikasi ...
                    }
                });
        }
    }

    document.getElementById('chat_input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            sendMessage();
        }
    });
</script>
@endsection