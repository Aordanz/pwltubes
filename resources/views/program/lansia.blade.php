@extends('layouts.layout')

@section('title', 'Program Lansia')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MyApp' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

<!-- Header Section -->
<header id="home" class="pt-32 pb-20 bg-[#e2e8f0]">
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 items-center gap-8">
    <div class="text-center md:text-left">
      <h1 class="text-5xl font-extrabold italic text-[#38bdf8] leading-tight relative">
        HIDUP SEHAT UNTUK HIDUP BAHAGIA
      </h1>
      <h2 class="text-4xl font-extrabold italic text-[#0f172a] mt-6">KESEHATAN ADALAH PRIORITAS</h2>
      <p class="text-[#475569] mt-4">
         Hidup sehat merupakan tanggung jawab diri kita bagaimana kita merawat tubuh dan pikiran kita serta menjaga kesehatan tubuh kita.
      <div class="mt-6">
        <button class="bg-[#0f172a] hover:bg-[#38bdf8] text-white px-6 py-3 rounded">Pelajari Lebih Lanjut</button>
      </div>
    </div>
    <div>
      <img src="{{ asset('images/logo_simpus.png') }}" alt="header" class="float-right -mt-2 max-w-[400px] rounded-xl" />
    </div>
  </div>
</header>

<!-- Popular Classes -->
<section id="class" class="py-20 bg-gray-50 text-black">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Kalender Aktivitas 30 Hari</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($activities as $index => $activity)
        <a href="{{ route('activity.lansia.show', ['id' => $loop->index + 1]) }}" class="block">
          <div class="relative border p-5 rounded-lg shadow hover:shadow-lg transition {{ ($index + 1) % 4 == 0 ? 'bg-green-100' : 'bg-white' }}">
            <form method="POST" action="{{ route('program.terpenuhi') }}" class="absolute top-2 right-2">
              @csrf
              <input type="hidden" name="hari" value="{{ $index + 1 }}">
              <input type="hidden" name="kategori" value="lansia">
              <input type="checkbox" 
                     id="checkbox-{{ $index }}" 
                     onchange="markComplete({{ $index }}, 'lansia')" 
                     class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-0 cursor-pointer"
                     {{ in_array($index + 1, $completedDays ?? []) ? 'checked disabled' : '' }}>
            </form>
            <div class="flex justify-between items-center mb-2">
              <span class="text-sm font-semibold text-gray-500">Hari ke-{{ $index + 1 }}</span>
              <span class="bg-purple-100 text-purple-700 text-xs px-2 py-1 rounded-full">
                @if(($index + 1) % 4 == 0)
                  Hari Istirahat
                @else
                  {{ $activity }}
                @endif
              </span>
            </div>
            <img src="{{ ($index + 1) % 4 == 0 
              ? 'https://source.unsplash.com/400x250/?elderly,rest' 
              : 'https://source.unsplash.com/400x250/?senior,exercise' }}" 
              class="rounded mb-3" 
              alt="Aktivitas Hari {{ $index + 1 }}">
            <p class="text-gray-700 text-sm">
              @if(($index + 1) % 4 == 0)
                Hari ke-{{ $index + 1 }} adalah waktu istirahat untuk menjaga kondisi tubuh.
              @else
                Aktivitas hari ke-{{ $index + 1 }} untuk lansia: {{ $activity }}.
              @endif
            </p>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<!-- Notifikasi Aktivitas Selesai -->
<div id="notification" class="fixed bottom-5 right-5 bg-green-500 text-white py-3 px-5 rounded-lg shadow-lg hidden">
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


<!-- Mentor Section - Compact & Centered Avatar -->
<section class="py-20 bg-gradient-to-r from-teal-800 via-teal-700 to-cyan-800 text-white">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-12">Diskusikan dengan Ahli Kami</h2>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
      
      <!-- Mentor 1 -->
      <div onclick="openChat('Amadeo Hutahean')" 
           class="cursor-pointer bg-white/10 rounded-2xl shadow-lg hover:shadow-xl transition hover:scale-105 p-5 text-center">
        <div class="w-24 h-24 mx-auto overflow-hidden rounded-full border-4 border-white mb-4">
          <img src="{{ asset('images/dokter.jpg') }}" alt="Mentor" class="object-cover w-full h-full" />
        </div>
        <h4 class="text-lg font-semibold text-white">Nicolas Purba</h4>
        <p class="text-teal-200 text-sm">Ahli Gaya Hidup Sehat</p>
      </div>

    </div>
  </div>
</section>

<!-- ==================== Live Chat Box ==================== -->
<div id="chatBox" class="fixed bottom-4 right-4 w-96 bg-white shadow-lg rounded-xl p-4 hidden z-50">
  <div class="flex justify-between items-center mb-2">
    <h3 id="mentorName" class="font-bold text-lg">Chat</h3>
    <button onclick="closeChat()" class="text-red-500 text-xl">&times;</button>
  </div>
  <div id="chatMessages" class="h-64 overflow-y-auto border p-2 mb-2 bg-gray-100 rounded text-sm">
    <!-- Pesan-pesan akan muncul di sini -->
  </div>
 <div class="flex">
  <input type="text" id="chatInput" class="flex-1 border rounded-l px-2 py-1 mr-2" placeholder="Ketik pesan...">
  <button onclick="sendMessage()" class="bg-blue-500 text-white px-4 rounded-r">Kirim</button>
</div>
</div>

<!-- ==================== Script JavaScript ==================== -->
<script>
  function openChat(mentor) {
    document.getElementById('chatBox').classList.remove('hidden');
    document.getElementById('mentorName').innerText = `Chat dengan ${mentor}`;
    document.getElementById('chatInput').focus();

    // Kosongkan chat sebelumnya (opsional)
    document.getElementById('chatMessages').innerHTML = '';
  }

  function closeChat() {
    document.getElementById('chatBox').classList.add('hidden');
  }

  function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    const chatMessages = document.getElementById('chatMessages');

    if (message !== '') {
      chatMessages.innerHTML += `<div class='mb-1'><strong>Anda:</strong> ${message}</div>`;
      chatMessages.scrollTop = chatMessages.scrollHeight;
      input.value = '';

      // Kirim ke backend via fetch/ajax jika diperlukan
    }
  }
</script>

<!-- Modern Footer -->
<footer class="bg-gradient-to-br from-sky-900 via-sky-800 to-sky-700 text-white py-16 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-10">

    <!-- Logo & Brand -->
    <div>
      <img src="{{ asset('images/logo_simpus.png') }}" alt="Logo" class="mb-4 w-44" />
     
    </div>

    <!-- Navigasi -->
    <div>
      <h4 class="text-xl font-semibold mb-4">Navigasi</h4>
      <ul class="space-y-2 text-slate-300">
        <li><a href="#home" class="hover:text-white transition">Home</a></li>
        <li><a href="#about" class="hover:text-white transition">Tentang Kami</a></li>
        <li><a href="#konsultasi" class="hover:text-white transition">Konsultasi</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div>
      <h4 class="text-xl font-semibold mb-4">Kontak Kami</h4>
      <ul class="space-y-2 text-slate-300">
        <li><i class="ri-map-pin-line mr-2 text-sky-300"></i>Simpang USU, Medan City</li>
        <li><i class="ri-mail-line mr-2 text-sky-300"></i><a href="mailto:kontak@healthpoint.com" class="hover:text-white transition">kontak@healthpoint.com</a></li>
        <li><i class="ri-phone-line mr-2 text-sky-300"></i><a href="tel:+6281298765432" class="hover:text-white transition">+62 812 9876 5432</a></li>
      </ul>
    </div>

    <!-- Sosial Media -->
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

  <!-- Copyright -->
  <div class="mt-12 border-t border-white/10 pt-6 text-center text-sm text-slate-400">
    © 2025 SimpusMedical - Kelompok 4. All rights reserved.
  </div>
</footer>

</body>
</html>
@endsection