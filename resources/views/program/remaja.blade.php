@extends('layouts.layout')

@section('title', 'Program Remaja')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MyApp' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    {{-- Vite directive untuk memuat bootstrap.js (yang berisi konfigurasi Echo) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    @keyframes slide-right {
      0% {
        transform: translateX(-100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .slide-in-right {
      animation: slide-right 1.5s ease-out forwards;
    }

    header#home::before {
      display: none !important;
      content: none !important;
    }
  </style>
</head>

<body class="bg-gray-100 font-sans">


<header id="home" class="w-full min-h-screen pt-32 pb-20 bg-no-repeat bg-center" 
        style="background-image: url('{{ asset('images/tar.png') }}'); background-size: 100% 100%; background-color: #f9fafb;">

  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 items-center gap-8">
    <div class="text-center md:text-left">
      <h1 data-aos="fade-right" data-aos-duration="1500" class="text-5xl font-extrabold italic text-[#38bdf8] leading-tight">
        HIDUP SEHAT UNTUK HIDUP BAHAGIA
      </h1> 

      <h2 data-aos="fade-right" data-aos-duration="1500" class="text-4xl font-extrabold italic text-[#0f172a] mt-6">
        KESEHATAN ADALAH PRIORITAS BAGI SEMUA ORANG
      </h2>

      <p class="text-[#475569] mt-4">
        Hidup sehat merupakan tanggung jawab diri kita bagaimana kita merawat tubuh dan pikiran kita serta menjaga kesehatan tubuh kita.
      </p>
      
      <div class="mt-6">
        <button class="bg-[#0f172a] hover:bg-[#38bdf8] text-white px-6 py-3 rounded">
          Pelajari Lebih Lanjut
        </button>
      </div>
    </div>

    <div>
      <img src="{{ asset('images/logo_simpus.png') }}" alt="header" class="float-right -mt-2 max-w-[400px] rounded-xl animate-bounce" />
    </div>
  </div>
</header>

<section id="about" class="relative py-24 bg-gradient-to-b from-[#a5a5a5] via-[#d9e3e9] to-[#eaf7ff] text-gray-800 overflow-hidden z-0">
  <div class="relative z-10 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
    
    <div class="relative group" data-aos="fade-right">
      <div class="overflow-hidden rounded-3xl shadow-2xl transition duration-500 group-hover:scale-105">
        <img src="{{ asset('images/rema.png') }}" alt="Tentang Kami" class="w-full object-cover" />
      </div>
    </div>

    <div data-aos="fade-left">
      <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 text-sky-800">
        Mengapa <span class="text-sky-600">Kesehatan</span> Penting bagi Remaja?
      </h2>
      <p class="text-lg text-gray-700 leading-relaxed mb-4">
        Masa remaja adalah periode penting dalam pertumbuhan fisik, emosional, dan mental. Menjalani pola hidup sehat di usia ini membantu membentuk fondasi tubuh yang kuat, meningkatkan konsentrasi belajar, serta mendukung perkembangan otak dan daya tahan tubuh.
      </p>
      <p class="text-lg text-gray-700 leading-relaxed">
        Dengan pola makan bergizi, aktivitas fisik teratur, serta tidur yang cukup dan manajemen stres, remaja dapat menghindari risiko obesitas, gangguan hormonal, dan masalah kesehatan mental, serta tumbuh menjadi individu yang produktif dan percaya diri.
      </p>
      <div class="mt-8">
        <h4 class="text-xl md:text-2xl italic font-semibold text-sky-800 bg-gray-300 px-4 py-2 rounded-lg inline-block">
          “Remaja Sehat Hari Ini, Pemimpin Hebat di Masa Depan”
        </h4>
      </div>
    </div>
  </div>
</section>

<section id="service" class="py-20 bg-gradient-to-r from-blue-500 via-blue-500 to-blue-500 text-white">
  <div class="max-w-[1200px] mx-auto px-6 text-center relative z-10">
    <h2 class="text-4xl font-extrabold mb-4 tracking-tight">Manfaat Gaya Hidup Sehat Bagi Remaja</h2>
    <p class="text-teal-100 max-w-2xl mx-auto text-lg">
      Hidup sehat sangat penting bagi remaja untuk mendukung pertumbuhan dan prestasi. Berikut manfaat utamanya:
    </p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 mt-16">
      <div class="bg-white/5 backdrop-blur-md border border-white/50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Mendukung Pertumbuhan Optimal</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Asupan gizi seimbang dan olahraga teratur membantu pertumbuhan fisik dan perkembangan otak.
        </p>
      </div>

      <div class="bg-white/5 backdrop-blur-md border border-white/50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Menjaga Fokus dan Prestasi Belajar</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Gaya hidup sehat meningkatkan konsentrasi, energi, dan performa akademik.
        </p>
      </div>

      <div class="bg-white/5 backdrop-blur-md border border-white/50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Menjaga Kesehatan Mental</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Tidur cukup, aktivitas fisik, dan manajemen stres membantu menjaga emosi tetap stabil.
        </p>
      </div>
    </div>
  </div>
  <div class="absolute w-[400px] h-[400px] bg-teal-300 opacity-10 rounded-full -top-20 -left-40 blur-3xl"></div>
  <div class="absolute w-[300px] h-[300px] bg-teal-500 opacity-10 rounded-full bottom-0 right-0 blur-2xl"></div>
</section>


<section id="class" class="py-20 bg-gray-50 text-black">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Kalender Aktivitas 30 Hari</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      @if (!empty($activities))
        @foreach($activities as $index => $activity)
          <a href="{{ route('activity.remaja.show', ['id' => $index + 1]) }}" class="block">
            <div class="relative border p-5 rounded-lg shadow hover:shadow-lg transition {{ ($index + 1) % 4 == 0 ? 'bg-red-100' : 'bg-white' }}">
              {{-- Checkbox --}}
              <form method="POST" action="{{ route('program.terpenuhi') }}" class="absolute top-2 right-2">
                @csrf
                <input type="hidden" name="hari" value="{{ $index + 1 }}">
                <input type="hidden" name="kategori" value="remaja">
                <input type="checkbox"
                       id="checkbox-{{ $index }}"
                       onchange="markComplete({{ $index }}, 'remaja')"
                       class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-0 cursor-pointer"
                       {{ in_array($index + 1, $completedDays ?? []) ? 'checked disabled' : '' }}>
              </form>

              {{-- Info Hari --}}
              <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-semibold text-gray-500">Hari ke-{{ $index + 1 }}</span>
                <span class="bg-teal-100 text-teal-700 text-xs px-2 py-1 rounded-full">
                  {{ ($index + 1) % 4 == 0 ? 'Rest Day' : $activity }}
                </span>
              </div>

              {{-- Gambar --}}
              <img src="{{ ($index + 1) % 4 == 0 ? 'https://source.unsplash.com/400x250/?rest,day' : 'https://source.unsplash.com/400x250/?exercise,day' }}"
                   class="rounded mb-3"
                   alt="Aktivitas Hari {{ $index + 1 }}">

              {{-- Deskripsi --}}
              <p class="text-gray-700 text-sm">
                @if(($index + 1) % 4 == 0)
                  Hari ke-{{ $index + 1 }} adalah Rest Day.
                @else
                  Aktivitas hari ke-{{ $index + 1 }}: {{ $activity }}.
                @endif
              </p>
            </div>
          </a>
        @endforeach
      @endif
    </div>
  </div>
</section>

<div id="notification" class="fixed bottom-5 right-5 bg-green-500 text-white py-3 px-5 rounded-lg shadow-lg hidden z-50">
  <p class="font-semibold">Aktivitas Selesai!</p>
  <p class="text-sm">Anda mendapatkan 1 bintang</p>
</div>

<script>
  function markComplete(index, kategori) {
    const checkbox = document.getElementById(`checkbox-${index}`);
    if (checkbox.checked) {
      fetch("{{ route('program.terpenuhi') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
          hari: index + 1,
          kategori: kategori
        })
      }).then(response => {
        if (response.ok) {
          checkbox.disabled = true;
          const notification = document.getElementById('notification');
          notification.classList.remove('hidden');
          setTimeout(() => {
            notification.classList.add('hidden');
          }, 3000);
        }
      });
    }
  }
</script>

<section class="py-20 bg-gradient-to-r from-blue-500 via-blue-500 to-blue-500 text-white">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-12">Diskusikan dengan Ahli Kami</h2>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
      
      {{-- Pastikan variabel $doctors sudah dikirim dari ProgramController --}}
      @if(isset($doctors) && !$doctors->isEmpty())
          
          {{-- BUKA LOOP DI SINI --}}
          @foreach($doctors as $doctor)
              <div 
                  onclick="openChat('{{ $doctor->name }}', {{ $doctor->id }})" 
                  class="cursor-pointer bg-white/10 rounded-2xl shadow-lg hover:shadow-xl transition hover:scale-105 p-5 text-center">
                  <div class="w-24 h-24 mx-auto overflow-hidden rounded-full border-4 border-white mb-4">
                      <img src="{{ asset('images/dokter.jpg') }}" alt="Mentor" class="object-cover w-full h-full" />
                  </div>
                  <h4 class="text-lg font-semibold text-white">{{ $doctor->name }}</h4>
                  <p class="text-teal-200 text-sm">Ahli Gaya Hidup Sehat</p>
              </div>
          @endforeach

      @else
          <p class="text-center col-span-full">Saat ini tidak ada ahli yang tersedia.</p>
      @endif

    </div>
  </div>
</section>


<div id="chatBox" class="fixed bottom-4 right-4 w-96 bg-white shadow-lg rounded-xl p-4 hidden z-50">
  <div class="flex justify-between items-center mb-2">
    <h3 id="mentorName" class="font-bold text-lg">Chat</h3>
    <button onclick="closeChat()" class="text-red-500 text-xl">&times;</button>
  </div>
  <div id="chatMessages" class="h-64 overflow-y-auto border p-2 mb-2 bg-gray-100 rounded text-sm"></div>
  <div class="flex">
    <input type="text" id="chatInput" class="flex-1 border rounded-l px-2 py-1 mr-2" placeholder="Ketik pesan...">
    <button onclick="sendMessage()" class="bg-blue-500 text-white px-4 rounded-r">Kirim</button>
  </div>
</div>

<script>
// =========================================================================
// SCRIPT LIVE CHAT REAL-TIME (FINAL)
// =========================================================================
let selectedMentorId = null;
let selectedMentorName = '';

// PENTING: Dapatkan ID pengguna yang sedang login.
@auth
    const currentUserId = {{ Auth::id() }};
@else
    const currentUserId = null;
@endauth

function openChat(mentorName, mentorId) {
    if (!currentUserId) {
        alert('Anda harus login untuk memulai chat.');
        return;
    }

    selectedMentorId = mentorId;
    selectedMentorName = mentorName;

    document.getElementById('chatBox').classList.remove('hidden');
    document.getElementById('mentorName').innerText = `Chat dengan ${mentorName}`;
    document.getElementById('chatMessages').innerHTML = '<p class="text-center text-gray-500">Memuat riwayat chat...</p>';
    
    fetchMessages(); 
    listenForMessages();
}

function closeChat() {
    document.getElementById('chatBox').classList.add('hidden');
    if(window.Echo && selectedMentorId) {
        const channelName = `chat.${currentUserId}.${selectedMentorId}`;
        window.Echo.leave(channelName);
    }
    selectedMentorId = null;
}

function sendMessage() {
    const input = document.getElementById('chatInput');
    const messageContent = input.value.trim();

    if (messageContent === '' || !selectedMentorId) return;

    appendMessage({
        content: messageContent,
        sender_id: currentUserId
    });

    

    fetch("{{ route('chat.send') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
            receiver_id: selectedMentorId,
            content: messageContent
        })
    })
    .catch(error => console.error('Error sending message:', error));
    
    input.value = '';
    input.focus();
}

function fetchMessages() {
    if (!selectedMentorId) return;

    const fetchUrl = `/chat/fetch/${selectedMentorId}`;

    fetch(fetchUrl)
        .then(response => response.json())
        .then(data => {
            const chatBox = document.getElementById('chatMessages');
            chatBox.innerHTML = '';
            data.forEach(msg => {
                appendMessage(msg);
            });
        })
        .catch(error => console.error('Error fetching messages:', error));
}

function listenForMessages() {
    if(window.Echo) {
        const channelName = `chat.${currentUserId}.${selectedMentorId}`;
        
        window.Echo.leave(channelName);
        
        window.Echo.private(channelName)
            .listen('.chat-message', (event) => {
                appendMessage(event.message);
            });
    } else {
        console.error('Laravel Echo not initialized! Pastikan Anda sudah menjalankan "npm run dev".');
    }
}

function appendMessage(msg) {
    const chatBox = document.getElementById('chatMessages');
    
    const isCurrentUserSender = msg.sender_id == currentUserId;

    const messageDiv = document.createElement('div');
    messageDiv.className = `mb-1 flex ${isCurrentUserSender ? 'justify-end' : 'justify-start'}`;
    
    const messageSpan = document.createElement('span');
    messageSpan.className = `inline-block max-w-xs break-words px-3 py-2 rounded-lg ${isCurrentUserSender ? 'bg-blue-500 text-white' : 'bg-gray-300 text-black'}`;
    messageSpan.textContent = msg.content;

    messageDiv.appendChild(messageSpan);
    chatBox.appendChild(messageDiv);
    
    chatBox.scrollTop = chatBox.scrollHeight;
}

document.getElementById('chatInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});
</script>


<footer class="bg-gradient-to-br from-sky-900 via-sky-800 to-sky-700 text-white py-16 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-10">

    <div>
      <img src="{{ asset('images/logo_simpus.png') }}" alt="Logo" class="mb-4 w-44" />
    </div>

    <div>
      <h4 class="text-xl font-semibold mb-4">Navigasi</h4>
      <ul class="space-y-2 text-slate-300">
        <li><a href="#home" class="hover:text-white transition">Home</a></li>
        <li><a href="#about" class="hover:text-white transition">Tentang Kami</a></li>
        <li><a href="#konsultasi" class="hover:text-white transition">Konsultasi</a></li>
      </ul>
    </div>

    <div>
      <h4 class="text-xl font-semibold mb-4">Kontak Kami</h4>
      <ul class="space-y-2 text-slate-300">
        <li><i class="ri-map-pin-line mr-2 text-sky-300"></i>Simpang USU, Medan City</li>
        <li><i class="ri-mail-line mr-2 text-sky-300"></i><a href="mailto:kontak@healthpoint.com" class="hover:text-white transition">kontak@healthpoint.com</a></li>
        <li><i class="ri-phone-line mr-2 text-sky-300"></i><a href="tel:+6281298765432" class="hover:text-white transition">+62 812 9876 5432</a></li>
      </ul>
    </div>

    <div>
      <h4 class="text-xl font-semibold mb-4">Ikuti Kami</h4>
      <div class="flex space-x-4 mt-2">
        <a href="#" class="text-sky-300 hover:text-white transition" aria-label="Facebook">
          <i class="ri-facebook-circle-fill text-2xl"></i>
        </a>
        <a href="#" class="text-sky-300 hover:text-white transition" aria-label="Instagram">
          <i class="ri-instagram-fill text-2xl"></i>
        </a>
        <a href="#" class="text-sky-300 hover:text-white transition" aria-label="Twitter">
          <i class="ri-twitter-x-fill text-2xl"></i>
        </a>
        <a href="#" class="text-sky-300 hover:text-white transition" aria-label="YouTube">
          <i class="ri-youtube-fill text-2xl"></i>
        </a>
      </div>
    </div>

  </div>

  <div class="mt-12 border-t border-white/10 pt-6 text-center text-sm text-slate-400">
    © 2025 SimpusMedical - Kelompok 4. All rights reserved.
  </div>
</footer>

</body>
</html>
@endsection