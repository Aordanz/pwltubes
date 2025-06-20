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

    /* Nonaktifkan lingkaran background jika ada di CSS luar */
    header#home::before {
      display: none !important;
      content: none !important;
    }
  </style>
</head>

<body class="bg-gray-100 font-sans">

<!-- Header Section -->
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

<!-- About Section -->
<section id="about" class="relative py-24 bg-gradient-to-b from-[#a5a5a5] via-[#d9e3e9] to-[#eaf7ff] text-gray-800 overflow-hidden z-0">

  <!-- HAPUS overlay lama, atau ganti jadi transparan total -->
  {{-- <div class="absolute inset-0 bg-white bg-opacity-50 backdrop-blur-sm"></div> --}}

  <!-- Why Health Is Important -->
  <div class="relative z-10 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
    
    <!-- Image Section -->
    <div class="relative group" data-aos="fade-right">
      <div class="overflow-hidden rounded-3xl shadow-2xl transition duration-500 group-hover:scale-105">
        <img src="{{ asset('images/lansia.png') }}" alt="Tentang Kami" class="w-full object-cover" />
      </div>
    </div>

<!-- Text Section -->
<div data-aos="fade-left">
  <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 text-sky-800">
    Mengapa <span class="text-sky-600">Kesehatan</span> Penting bagi lansia?
  </h2>
  <p class="text-lg text-gray-700 leading-relaxed mb-4">
    Seiring bertambahnya usia, tubuh mengalami penurunan fungsi alami. Pola hidup sehat menjadi kunci utama untuk menjaga kebugaran fisik dan daya tahan tubuh lansia agar tetap aktif dan mandiri.
  </p>
  <p class="text-lg text-gray-700 leading-relaxed">
    Dengan pola makan bergizi, olahraga teratur, dan kesehatan mental yang terjaga, lansia dapat mengurangi risiko penyakit kronis, memperkuat daya ingat, serta menjalani masa tua dengan kualitas hidup yang lebih baik dan bahagia.
  </p>
  <div class="mt-8">
    <h4 class="text-xl md:text-2xl italic font-semibold text-sky-800 bg-gray-100 px-4 py-2 rounded-lg inline-block">
      “Pola Hidup Sehat, Investasi Masa Tua yang Berkualitas”
    </h4>
  </div>
</div>

    </div>
  </div>
</section>

<!-- Services Section Modern Teal-Aqua -->
<section id="service" class="py-24 bg-gradient-to-r from-teal-800 via-teal-700 to-cyan-800 text-white relative overflow-hidden">
  <div class="max-w-[1200px] mx-auto px-6 text-center relative z-10">
    <h2 class="text-4xl font-extrabold mb-4 tracking-tight">Manfaat Gaya Hidup Sehat Bagi Lansia</h2>
    <p class="text-teal-100 max-w-2xl mx-auto text-lg">
      Gaya hidup sehat berdampak besar pada kualitas hidup para lansia. Berikut manfaat utamanya:
    </p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 mt-16">
      <!-- Card 1 -->
      <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Meningkatkan Kemandirian</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Olahraga ringan, makan seimbang, dan tidur cukup membantu lansia menjaga kondisi fisik dan mental — membuat mereka tetap mandiri dalam aktivitas harian.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Meningkatkan Kesehatan Mental</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Interaksi sosial positif dan gaya hidup aktif menurunkan risiko depresi dan demensia, serta meningkatkan rasa bahagia dan ketenangan.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Memperpanjang Usia & Kualitas Hidup</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Kebiasaan sehat seperti olahraga, makanan bergizi, dan cek kesehatan rutin, memperpanjang usia dengan kualitas hidup yang lebih baik.
        </p>
      </div>
    </div>
  </div>

  <!-- Decorative Gradient Circles -->
  <div class="absolute w-[400px] h-[400px] bg-teal-300 opacity-10 rounded-full -top-20 -left-40 blur-3xl"></div>
  <div class="absolute w-[300px] h-[300px] bg-teal-500 opacity-10 rounded-full bottom-0 right-0 blur-2xl"></div>
</section>



<!-- Popular Classes -->
<section id="class" class="py-20 bg-gray-50 text-black">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Kalender Aktivitas 30 Hari</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      

      <!-- Contoh Hari ke-1 -->
      @foreach($activities as $index => $activity)
  <a href="{{ route('activity.lansia.show', ['id' => $loop->index + 1]) }}" class="block">
    <div class="relative border p-5 rounded-lg shadow hover:shadow-lg transition 
                {{ ($index + 1) % 4 == 0 ? 'bg-green-100' : 'bg-white' }}">

      {{-- Checkbox di pojok kanan atas --}}
      <form method="POST" action="{{ route('program.terpenuhi', ['kategori' => 'lansia']) }}" class="absolute top-2 right-2">
        @csrf
        <input type="hidden" name="hari" value="{{ $index + 1 }}">
        <input type="checkbox" id="checkbox-{{ $index }}" onchange="markComplete({{ $index }})"
               class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-0 cursor-pointer">
      </form>

      {{-- Header Hari --}}
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

      {{-- Gambar Aktivitas --}}
      <img src="{{ ($index + 1) % 4 == 0 
        ? 'https://source.unsplash.com/400x250/?elderly,rest' 
        : 'https://source.unsplash.com/400x250/?senior,exercise' }}" 
        class="rounded mb-3" 
        alt="Aktivitas Hari {{ $index + 1 }}">

      {{-- Deskripsi Aktivitas --}}
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



      <!-- dan seterusnya sampai Hari ke-30 -->
      <!-- Pseudo-loop selesai -->
    </div>
  </div>
</section>

<!-- Notifikasi Aktivitas Selesai -->
<div id="notification" class="fixed bottom-5 right-5 bg-green-500 text-white py-3 px-5 rounded-lg shadow-lg hidden">
    <p class="font-semibold">Aktivitas Selesai!</p>
    <p class="text-sm">Anda mendapatkan 1 bintang</p>
    
</div>

<script>
  // Fungsi untuk menampilkan notifikasi saat checkbox dicentang
  function markComplete(index) {
    const checkbox = document.getElementById(`checkbox-${index}`);
    const notification = document.getElementById('notification');

    if (checkbox.checked) {
      notification.classList.remove('hidden');
      setTimeout(function() {
        notification.classList.add('hidden');
      }, 3000); // Notifikasi hilang setelah 3 detik
    }
  }
</script>

<section class="py-20 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold leading-tight text-white relative">
      Diskusikan dengan Ahli Kami
      <span class="absolute -top-12 text-[6rem] font-extrabold text-black/5"></span>
    </h2>
    <div class="flex flex-wrap gap-8 mt-16">
      <!-- Card Mentor 1 -->
      <div onclick="openChat('Nicolas Purba')" class="cursor-pointer text-center bg-white p-6 rounded-xl shadow-lg">
        <img src="/assets/trainer1.jpg" alt="Mentor" class="mb-4 rounded-2xl mx-auto w-full h-auto object-cover" />
        <h4 class="text-xl font-bold text-[#020617]">Nicolas Purba</h4>
        <p class="text-[#94a3b8]">Mentor Dalam Menjaga Kesehatan</p>
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
        <li><i class="ri-map-pin-line mr-2 text-sky-300"></i>Jl. Sehat No.123, Wellness City</li>
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
