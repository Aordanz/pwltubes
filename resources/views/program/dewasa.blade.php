@extends('layouts.layout')

@section('title', 'Program Dewasa')

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
<!-- Navbar -->
<!-- <nav class="fixed top-0 left-0 w-full z-50 bg-[#020617] shadow">
  <div class="max-w-[1200px] mx-auto px-4 py-4 flex items-center justify-between">
    <div class="max-w-[175px]">
      <img src="/assets/logo-light.png" alt="logo" class="block" />
    </div>
    <div class="text-white text-2xl cursor-pointer md:hidden">
      <i class="ri-menu-line" id="menu-btn"></i>
    </div>
    <ul id="nav-links" class="hidden md:flex gap-6 text-white font-semibold">
      <li><a href="#home" class="hover:text-[#42c8c9]">Home</a></li>
      <li><a href="#about" class="hover:text-[#42c8c9]">About</a></li>
      <li><a href="#service" class="hover:text-[#42c8c9]">Services</a></li>
      <li><a href="#class" class="hover:text-[#42c8c9]">Classes</a></li>
      <li><a href="#contact" class="hover:text-[#42c8c9]">Blog</a></li>
      <li><a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a></li>
      <li><a href="{{ route('register') }}" class="hover:text-[#42c8c9]">Register</a></li>
    </ul>
  </div>
</nav> -->

<!-- Header Section -->
<header id="home" class="pt-32 pb-20 bg-[#e2e8f0]">
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 items-center gap-8">
    <div class="text-center md:text-left">
      <h1 class="text-5xl font-extrabold italic text-[#38bdf8] leading-tight relative">
        HIDUP SEHAT UNTUK HIDUP BAHAGIA
        <span class="absolute -top-20 -left-20 text-[8rem] font-extrabold text-black/5 leading-[10rem] hidden md:block">
        </span>
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

<!-- About Section -->
<section id="about" class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
    <div class="relative" data-aos="fade-right">
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-green-100 rounded-full -z-10 blur-2xl"></div>
      <img src="{{ asset('images/gayahidup.jpg') }}" alt="about" class="rounded-lg mx-auto mr-50" />

    </div>
    <div data-aos="fade-left">
      <h2 class="text-3xl font-bold text-[#065f46]">Mengapa Kesehatan Itu Penting?</h2>
      <p class="mt-4 text-gray-600">
        Kesehatan merupakan salah satu aspek paling penting dalam kehidupan manusia karena tanpa kesehatan yang baik, berbagai aktivitas dan tujuan hidup menjadi sulit untuk dicapai. Tubuh yang sehat memungkinkan kita untuk menjalani rutinitas sehari-hari dengan energi dan semangat, serta berfungsi optimal dalam menjalankan pekerjaan, berinteraksi sosial, dan menikmati waktu luang. 
      </p>
      <p class="mt-3 text-gray-600">
        Selain itu, kesehatan yang baik juga mendukung produktivitas, membantu mengurangi stres, dan meningkatkan kualitas hidup secara keseluruhan. Dengan kesehatan yang terjaga, seseorang lebih mampu untuk menghadapi tantangan dan tekanan yang ada dalam kehidupan.
      </p>
      
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="service" class="py-20 bg-[#020617] text-white">
  <div class="max-w-[1200px] mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold leading-tight relative">
      Manfaat Gaya Hidup Sehat Bagi Dewasa
      <span class="absolute -top-12 text-[6rem] font-extrabold leading-[6rem] text-white/10"></span>
    </h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">01</span>
        <h4 class="text-xl font-semibold">Mencegah Penyakit Kronis</h4>
        <p class="text-[#94a3b8]">Di kalangan orang dewasa risiko terkena penyakit seperti hipertensi, diabetes, kolesterol tinggi, dan penyakit jantung 
            mulai meningkat. Gaya hidup sehat — seperti makan bergizi, olahraga rutin, 
            dan tidur cukup — membantu menjaga tekanan darah, kadar gula darah, dan kolesterol tetap normal..</p>
      </div>
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">02</span>
        <h4 class="text-xl font-semibold">Menjaga Kesehatan Mental</h4>
        <p class="text-[#94a3b8]">Di kalangan dewasa seringkali penuh tekanan karena tuntutan pekerjaan dan tanggung jawab keluarga. Hidup sehat membantu menjaga keseimbangan hormon,
             memperbaiki kualitas tidur, dan meningkatkan energi harian serta kestabilan suasana hati .</p>
      </div>
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">03</span>
        <h4 class="text-xl font-semibold">Memperkuat Sistem Imun</h4>
        <p class="text-[#94a3b8]">Asupan nutrisi yang cukup (seperti vitamin C, D, dan zinc), serta gaya hidup aktif, akan memperkuat daya tahan tubuh. 
            =Ini penting karena semakin bertambah usia, sistem imun secara alami mulai melemah.</p>
      </div>
    </div>
  </div>
</section>

<!-- Popular Classes -->
<section id="class" class="py-20 bg-gray-50 text-black">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Kalender Aktivitas 30 Hari</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      

      <!-- Contoh Hari ke-1 -->
      @foreach($activities as $index => $activity)
  <a href="{{ route('activity.show', ['id' => $index + 1]) }}" class="block">
    <div class="border p-5 rounded-lg shadow hover:shadow-lg transition 
                {{ ($index + 1) % 4 == 0 ? 'bg-red-100' : 'bg-white' }}">
      <div class="flex justify-between items-center mb-2">
        <span class="text-sm font-semibold text-gray-500">Hari ke-{{ $index + 1 }}</span>
        <span class="bg-teal-100 text-teal-700 text-xs px-2 py-1 rounded-full">
          {{-- Jika indeks adalah kelipatan 4 (rest day), tampilkan Rest Day --}}
          @if(($index + 1) % 4 == 0)
            Rest Day
          @else
            {{ $activity }}
          @endif
        </span>
      </div>
      
      {{-- Jika hari adalah rest day, tampilkan gambar yang sesuai --}}
      <img src="{{ ($index + 1) % 4 == 0 ? 'https://source.unsplash.com/400x250/?rest,day' : 'https://source.unsplash.com/400x250/?exercise,day' }}" class="rounded mb-3" alt="Aktivitas Hari {{ $index + 1 }}">
      
      {{-- Deskripsi hari --}}
      <p class="text-gray-700 text-sm">
        @if(($index + 1) % 4 == 0)
          Hari ke-{{ $index + 1 }} adalah Rest Day.
        @else
          Aktivitas yang harus dilakukan hari ke-{{ $index + 1 }}: {{ $activity }}.
        @endif
      </p>
    </div>
  </a>
@endforeach


      <!-- dan seterusnya sampai Hari ke-30 -->
      <!-- Pseudo-loop selesai -->
    </div>
  </div>
</section>

<section class="py-20 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold leading-tight text-white relative">
      Diskusikan dengan Ahli Kami
      <span class="absolute -top-12 text-[6rem] font-extrabold text-black/5">Best Team</span>
    </h2>
    <div class="flex flex-wrap gap-8 mt-16">
      <!-- Card Mentor 1 -->
      <div onclick="openChat('Nicolas Purba')" class="cursor-pointer text-center bg-white p-6 rounded-xl shadow-lg">
        <img src="/assets/trainer1.jpg" alt="Mentor" class="mb-4 rounded-2xl mx-auto w-full h-auto object-cover" />
        <h4 class="text-xl font-bold text-[#020617]">Nicolas Purba</h4>
        <p class="text-[#94a3b8]">Mentor Dalam Menjaga Kesehatan</p>
      </div>

      <!-- Card Mentor 2 -->
      <div onclick="openChat('Christian Barus')" class="cursor-pointer text-center bg-white p-6 rounded-xl shadow-lg">
        <img src="/assets/trainer2.jpg" alt="Mentor" class="mb-4 rounded-2xl mx-auto w-full h-auto object-cover" />
        <h4 class="text-xl font-bold text-[#020617]">Christian Barus</h4>
        <p class="text-[#94a3b8]">Mentor Dalam Mengatur Gizi </p>
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


<!-- Footer -->
<footer class="bg-[#0f172a] text-white py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">
    
    <!-- Logo & Copyright -->
    <div>
      <img src="/assets/logo-light.png" alt="Logo" class="mb-6 w-40" />
      <p class="text-[#94a3b8] text-sm">© 2025 HealthPoint. All rights reserved.</p>
    </div>

    <!-- Navigasi -->
    <div>
      <h4 class="text-xl font-semibold mb-4 text-white">Navigasi</h4>
      <ul class="space-y-2 text-[#94a3b8]">
        <li><a href="#home" class="hover:text-white transition">Home</a></li>
        <li><a href="#about" class="hover:text-white transition">About</a></li>
        <li><a href="#service" class="hover:text-white transition">Services</a></li>
        <li><a href="#class" class="hover:text-white transition">Classes</a></li>
      </ul>
    </div>

    <!-- Kontak Kami -->
    <div>
      <h4 class="text-xl font-semibold mb-4 text-white">Kontak Kami</h4>
      <ul class="space-y-2 text-[#94a3b8]">
        <li>Jl. Sehat No.123, Wellness Cit</li>
        <li><a href="mailto:kontak@healthpoint.com" class="hover:text-white transition">kontak@healthpoint.com</a></li>
        <li><a href="tel:+6281298765432" class="hover:text-white transition">+62 812 9876 5432</a></li>
      </ul>
      <!-- Sosial Media -->
      <div class="mt-6 flex space-x-4">
        <a href="#" class="text-[#94a3b8] hover:text-white transition" aria-label="Facebook">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.62 9.87v-6.99h-2.6v-2.88h2.6V9.41c0-2.57 1.53-3.99 3.88-3.99 1.12 0 2.3.2 2.3.2v2.53h-1.3c-1.28 0-1.68.8-1.68 1.62v1.96h2.85l-.46 2.88h-2.39v6.99A10 10 0 0022 12z"/></svg>
        </a>
        <a href="#" class="text-[#94a3b8] hover:text-white transition" aria-label="Instagram">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.584.012 4.85.07 1.17.054 1.96.24 2.41.406a4.89 4.89 0 011.75 1.13 4.9 4.9 0 011.13 1.75c.165.45.352 1.24.406 2.41.058 1.266.07 1.65.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.24 1.96-.406 2.41a4.9 4.9 0 01-1.13 1.75 4.9 4.9 0 01-1.75 1.13c-.45.165-1.24.352-2.41.406-1.266.058-1.65.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.96-.24-2.41-.406a4.9 4.9 0 01-1.75-1.13 4.9 4.9 0 01-1.13-1.75c-.165-.45-.352-1.24-.406-2.41C2.212 15.584 2.2 15.2 2.2 12s.012-3.584.07-4.85c.054-1.17.24-1.96.406-2.41a4.89 4.89 0 011.13-1.75 4.89 4.89 0 011.75-1.13c.45-.165 1.24-.352 2.41-.406C8.416 2.212 8.8 2.2 12 2.2zm0 2.05c-3.15 0-3.52.012-4.77.068-1.07.05-1.65.22-2.03.37a2.85 2.85 0 00-1.04.68c-.3.3-.522.66-.68 1.04-.15.38-.32.96-.37 2.03-.056 1.25-.068 1.62-.068 4.77s.012 3.52.068 4.77c.05 1.07.22 1.65.37 2.03.158.38.38.74.68 1.04.3.3.66.522 1.04.68.38.15.96.32 2.03.37 1.25.056 1.62.068 4.77.068s3.52-.012 4.77-.068c1.07-.05 1.65-.22 2.03-.37.38-.158.74-.38 1.04-.68.3-.3.522-.66.68-1.04.15-.38.32-.96.37-2.03.056-1.25.068-1.62.068-4.77s-.012-3.52-.068-4.77c-.05-1.07-.22-1.65-.37-2.03a2.85 2.85 0 00-.68-1.04 2.85 2.85 0 00-1.04-.68c-.38-.15-.96-.32-2.03-.37-1.25-.056-1.62-.068-4.77-.068zM12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.176a4.014 4.014 0 110-8.028 4.014 4.014 0 010 8.028zm6.406-10.848a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/></svg>
        </a>
      </div>
    </div>

  </div>
</footer>


</body>
</html>
@endsection
