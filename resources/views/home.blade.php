@extends('layouts.layout')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title ?? 'MyApp' }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
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
        <img src="{{ asset('images/gayahidup.jpg') }}" alt="Tentang Kami" class="w-full object-cover" />
      </div>
    </div>

    <!-- Text Section -->
    <div data-aos="fade-left">
      <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 text-sky-800">
        Mengapa <span class="text-sky-600">Kesehatan</span> Itu Penting?
      </h2>
      <p class="text-lg text-gray-700 leading-relaxed mb-4">
        Kesehatan adalah pondasi utama kehidupan. Tanpa tubuh yang sehat, aktivitas harian menjadi beban, semangat menurun, dan kualitas hidup terpengaruh secara drastis.
      </p>
      <p class="text-lg text-gray-700 leading-relaxed">
        Dengan menjaga kesehatan, kita memperkuat ketahanan terhadap stres, meningkatkan produktivitas, dan memperpanjang usia dengan penuh kualitas.
      </p>
      <div class="mt-8">
        <h4 class="text-xl md:text-2xl italic font-semibold text-sky-800 bg-gray-100 px-4 py-2 rounded-lg inline-block">
          “MULAILAH HIDUP SEHAT BERSAMA KAMI”
        </h4>
      </div>
     <button onclick="window.location.href='/register'" class="mt-8 inline-block bg-emerald-500 hover:bg-emerald-700 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition duration-300">
  Gabung Sekarang
</button>

    </div>
  </div>
</section>


 <!-- Live Well Section -->
<section class="w-full bg-[#eaf7ff] py-20">
  <div class="w-full grid md:grid-cols-2 items-center gap-16 px-8 md:px-16">
    
    <!-- Text -->
    <div data-aos="fade-up-right">
      <h3 class="text-4xl font-bold text-emerald-700 mb-6">Hidup Sehat, Setiap Hari</h3>
      <p class="text-lg text-gray-700 mb-8">
        Kesehatan bukan hanya tentang tidak sakit, tetapi tentang bagaimana kamu hidup, merasa, dan berkembang setiap hari. Mulailah hari-harimu dengan lebih sehat secara mental dan fisik.
      </p>
      <ul class="space-y-4">
        <li class="flex items-start space-x-3">
          <i class="ri-moon-line text-2xl text-emerald-600"></i>
          <span><strong>Tidur Berkualitas:</strong> Atur pola tidur yang konsisten untuk energi optimal.</span>
        </li>
        <li class="flex items-start space-x-3">
          <i class="ri-restaurant-2-line text-2xl text-emerald-600"></i>
          <span><strong>Nutrisi Seimbang:</strong> Asupan makanan yang sehat mempengaruhi semua aspek hidup.</span>
        </li>
        <li class="flex items-start space-x-3">
          <i class="ri-emotion-happy-line text-2xl text-emerald-600"></i>
          <span><strong>Kesehatan Mental:</strong> Kendalikan stres dan jaga keseimbangan emosi.</span>
        </li>
      </ul>
    </div>

    <!-- Illustration -->
    <div data-aos="fade-up-left">
      <div class="overflow-hidden shadow-2xl hover:scale-105 transition-all duration-500">
        <img src="{{ asset('images/sehat.png') }}" alt="Healthy Lifestyle" class="w-full h-auto object-cover rounded-3xl" />
      </div>
    </div>

  </div>
</section>




<!-- Include AOS script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<!-- Mentor Section - Compact & Centered Avatar -->
<section class="w-full bg-[#eaf7ff] py-20">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold mb-12">Diskusikan dengan Ahli Kami</h2>

    <div class="flex justify-center">
      
      <!-- Mentor 1 -->
      <div onclick="openChat('Amadeo Hutahean')" 
             class="cursor-pointer bg-sky-600 rounded-2xl shadow-lg hover:shadow-xl transition hover:scale-105 p-5 text-center font-sans">
        <div class="w-24 h-24 mx-auto overflow-hidden rounded-full border-4 border-white mb-4">
          <img src="{{ asset('images/dokter.jpg') }}" alt="Mentor" class="object-cover w-full h-full" />
        </div>
        <h4 class="text-lg font-semibold text-white">Nicolas Purba</h4>
        <p class="text-teal-200 text-sm">Ahli Gaya Hidup Sehat</p>
      </div>
<script>
  function openChat(mentorName) {
    // Simpan nama mentor ke localStorage (jika ingin digunakan setelah login)
    localStorage.setItem("selectedMentor", mentorName);
    // Redirect ke halaman login
    window.location.href = "/login";
  }
</script>
      
     
      </div>
    </div>
  </div>
</section>

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
