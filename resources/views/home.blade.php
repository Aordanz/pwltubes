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
</head>

<body class="bg-gray-100 font-sans">

<!-- Header Section -->
<header id="home" class="pt-32 pb-20 bg-[#e2e8f0]">
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
</style>
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 items-center gap-8">
    <div class="text-center md:text-left">

 <h1 data-aos="fade-right" data-aos-duration="1500" class="text-5xl font-extrabold italic text-[#38bdf8] leading-tight relative">
  HIDUP SEHAT UNTUK HIDUP BAHAGIA
</h1>


      <h2 data-aos="fade-right" data-aos-duration="1500" class="text-4xl font-extrabold italic text-[#0f172a] mt-6">KESEHATAN ADALAH PRIORITAS BAGI SEMUA ORANG</h2>

      <p class="text-[#475569] mt-4">
        Hidup sehat merupakan tanggung jawab diri kita bagaimana kita merawat tubuh dan pikiran kita serta menjaga kesehatan tubuh kita.
        </p>
        
      <div class="mt-6">
        <button class="bg-[#0f172a] hover:bg-[#38bdf8] text-white px-6 py-3 rounded">Pelajari Lebih Lanjut</button>
      </div>
    </div>
    <div>


      <img src="{{ asset('images/logo_simpus.png') }}" alt="header" class="float-right -mt-2 max-w-[400px] rounded-xl floating-img animate-bounce" />
   </div>

    </div>

  </div>
</header>

<!-- About Section -->
<section id="about" class="py-20 bg-gradient-to-r from-[#1e3a8a] via-[#3b82f6] to-[#38bdf8] relative">
  <!-- Lingkaran putih di setengah latar belakang -->
  <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-[600px] h-[600px] bg-white rounded-full opacity-20 -z-10"></div>

  <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
    <div class="relative" data-aos="fade-right">
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-green-100 rounded-full -z-10 blur-2xl"></div>

      <img src="{{ asset('images/gayahidup.jpg') }}" alt="about" class="rounded-lg mx-auto mr-50" />


    </div>
    <div data-aos="fade-left">
      <h2 class="text-3xl font-bold text-white">Mengapa Kesehatan Itu Penting?</h2>
      <p class="mt-4 text-gray-200">
        Kesehatan merupakan salah satu aspek paling penting dalam kehidupan manusia karena tanpa kesehatan yang baik, berbagai aktivitas dan tujuan hidup menjadi sulit untuk dicapai. Tubuh yang sehat memungkinkan kita untuk menjalani rutinitas sehari-hari dengan energi dan semangat, serta berfungsi optimal dalam menjalankan pekerjaan, berinteraksi sosial, dan menikmati waktu luang. 
      </p>
      <p class="mt-3 text-gray-200">
        Selain itu, kesehatan yang baik juga mendukung produktivitas, membantu mengurangi stres, dan meningkatkan kualitas hidup secara keseluruhan. Dengan kesehatan yang terjaga, seseorang lebih mampu untuk menghadapi tantangan dan tekanan yang ada dalam kehidupan.
      </p>
      <h4 class="text-2xl font-extrabold italic text-[#e5e7eb] mt-6">MAKA DARI ITU MARI JOIN BERSAMA KAMI MEMBANGUN HIDUP YANG SEHAT</h4>
      <button class="mt-6 bg-[#34d399] hover:bg-[#065f46] text-white px-6 py-3 rounded shadow-md transition">
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

<!-- Footer -->
<footer class="bg-[#0f172a] text-white py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">
    
    <!-- Logo & Copyright -->
    <div>
      <img src="/assets/logo-light.png" alt="Logo" class="mb-6 w-40" />
      <p class="text-[#94a3b8] text-sm">© 2025 SimpusMedical. Kelompok4.</p>
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
        <li>Jl. Sehat No.123, Wellness City</li>
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