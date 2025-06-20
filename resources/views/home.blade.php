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
<section id="about" class="relative py-24 bg-gradient-to-br from-blue-900 via-blue-500 to-cyan-400 text-white">
  <div class="absolute inset-0 bg-black bg-opacity-40"></div> <!-- Dark overlay for readability -->
  <div class="relative z-10 max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
    
    <!-- Image Section -->
    <div class="relative group" data-aos="fade-right">
      <div class="overflow-hidden rounded-3xl shadow-2xl transition duration-500 group-hover:scale-105">
        <img src="{{ asset('images/gayahidup.jpg') }}" alt="Tentang Kami" class="w-full object-cover" />
      </div>
    </div>

    <!-- Text Section -->
    <div data-aos="fade-left">
      <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
        Mengapa <span class="text-lime-300">Kesehatan</span> Itu Penting?
      </h2>
      <p class="text-lg text-gray-100 leading-relaxed mb-4">
        Kesehatan adalah pondasi utama kehidupan. Tanpa tubuh yang sehat, aktivitas harian menjadi beban, semangat menurun, dan kualitas hidup terpengaruh secara drastis. Kesehatan yang baik memungkinkan kita untuk bekerja dengan optimal, bersosialisasi, serta menikmati hidup dengan penuh energi.
      </p>
      <p class="text-lg text-gray-100 leading-relaxed">
        Dengan menjaga kesehatan, kita juga memperkuat ketahanan terhadap stres, meningkatkan produktivitas, dan memperpanjang usia dengan penuh kualitas. Karena itu, mari bergabung bersama kami untuk menjalani hidup yang lebih sehat dan bahagia.
      </p>
      <div class="mt-8">
        <h4 class="text-xl md:text-2xl italic font-semibold text-gray-200 bg-white bg-opacity-10 backdrop-blur-sm px-4 py-2 rounded-lg inline-block">
          “MULAILAH HIDUP SEHAT BERSAMA KAMI”
        </h4>
      </div>
      <button class="mt-8 inline-block bg-emerald-400 hover:bg-emerald-600 text-white font-semibold px-8 py-3 rounded-full shadow-lg transition duration-300">
        Gabung Sekarang
      </button>
    </div>
  </div>
</section>


<!-- Include AOS script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<!-- Services Section -->
<section id="konsultasi" >
<section class="py-20 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold leading-tight text-white relative">
      Diskusikan dengan Ahli Kami
      <span class="absolute -top-12 text-[6rem] font-extrabold text-black/5">Best Team</span>
    </h2>
    <div class="flex flex-wrap gap-8 mt-16">
      <!-- Card Mentor 1 -->
      <div onclick="openChat('Prawira Tarigan')" class="cursor-pointer text-center bg-white p-6 rounded-xl shadow-lg">
        <img src="/assets/trainer1.jpg" alt="Mentor" class="mb-4 rounded-2xl mx-auto w-full h-auto object-cover" />
        <h4 class="text-xl font-bold text-[#020617]">Prawira Tarigan</h4>
        <p class="text-[#94a3b8]">Mentor Dalam Melatih Otot</p>
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

<!-- Footer -->
<footer class="bg-[#0f172a] text-white py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">
    <div>
      <img src="/assets/logo-light.png" alt="Logo" class="mb-6 w-40" />
      <p class="text-[#94a3b8] text-sm">© 2025 SimpusMedical. Kelompok4.</p>
    </div>

    <div>
      <h4 class="text-xl font-semibold mb-4 text-white">Navigasi</h4>
      <ul class="space-y-2 text-[#94a3b8]">
        <li><a href="#home" class="hover:text-white transition">Home</a></li>
        <li><a href="#about" class="hover:text-white transition">About</a></li>
        <li><a href="#service" class="hover:text-white transition">Services</a></li>
        <li><a href="#class" class="hover:text-white transition">Classes</a></li>
      </ul>
    </div>

    <div>
      <h4 class="text-xl font-semibold mb-4 text-white">Kontak Kami</h4>
      <ul class="space-y-2 text-[#94a3b8]">
        <li>Jl. Sehat No.123, Wellness City</li>
        <li><a href="mailto:kontak@healthpoint.com" class="hover:text-white transition">kontak@healthpoint.com</a></li>
        <li><a href="tel:+6281298765432" class="hover:text-white transition">+62 812 9876 5432</a></li>
      </ul>
      <div class="mt-6 flex space-x-4">
        <!-- Icon Facebook -->
        <a href="#" class="text-[#94a3b8] hover:text-white transition" aria-label="Facebook">
          <i class="ri-facebook-fill text-xl"></i>
        </a>
        <!-- Icon Instagram -->
        <a href="#" class="text-[#94a3b8] hover:text-white transition" aria-label="Instagram">
          <i class="ri-instagram-line text-xl"></i>
        </a>
      </div>
    </div>
  </div>
</footer>

</body>
</html>
@endsection
