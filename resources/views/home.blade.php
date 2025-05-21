@extends('layouts.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MyApp' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Navbar -->
<nav class="fixed top-0 left-0 w-full z-50 bg-[#020617]">
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
<a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
<li><a href="{{ route('register') }}">Register</a></li>


    </ul>
  </div>
</nav>

<!-- Header Section -->
<header id="home" class="pt-32 pb-20 bg-[#e2e8f0]">
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 items-center gap-8">
    <div class="text-center md:text-left">
      <h1 class="text-5xl font-extrabold italic text-[#d6abd8] leading-tight relative">
        DON'T STOP TILL YOUR SUCCESS!
        <span class="absolute -top-20 -left-20 text-[8rem] font-extrabold text-black/5 leading-[10rem] hidden md:block">
          GROW YOUR STRENGTH
        </span>
      </h1>
      <h2 class="text-4xl font-extrabold italic text-[#020617] mt-6">GET FIT TO HAPPY</h2>
      <p class="text-[#94a3b8] mt-4">
        Unlock your full potential with our expert training and state-of-the-art facilities.
      </p>
      <div class="mt-6">
        <button class="bg-[#020617] hover:bg-[#42c8c9] text-white px-6 py-3 rounded">Explore More</button>
      </div>
    </div>
    <div>
      <img src="/assets/MEM2.jpg" alt="header" class="mx-auto max-w-[300px]" />
    </div>
  </div>
</header>

<!-- About Section -->
<section id="about" class="py-20 overflow-hidden">
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
    <div class="relative">
      <div class="absolute top-1/2 left-1/2 -translate-x-3/4 -translate-y-1/2 w-[calc(100%-5rem)] aspect-square bg-gradient-to-r from-[#eeb5c4] via-[#beb0e1] to-[#7ed6d8] rounded-full -z-10"></div>
<img src="{{ asset('images/holy.jpg') }}" alt="about" class="max-w-[550px] mx-auto" />
    </div>
    <div>
      <h2 class="text-3xl font-bold leading-tight relative z-10">
        Ready To Make A Change?
        <span class="absolute -top-12 text-[6rem] font-extrabold leading-[6rem] text-black/5 z-[-1]">About Us</span>
      </h2>
      <p class="text-[#94a3b8] mt-4">
        Whether you're a beginner or a seasoned athlete, our personalized training programs are here to help you.
      </p>
      <p class="text-[#94a3b8] my-4">
        With our trainers, energizing classes, and modern equipment, you'll stay committed and see results.
      </p>
      <button class="bg-[#020617] hover:bg-[#42c8c9] text-white px-6 py-3 rounded">Get Started</button>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="service" class="py-20 bg-[#020617] text-white">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold leading-tight relative">
      Services We Provide
      <span class="absolute -top-12 text-[6rem] font-extrabold leading-[6rem] text-white/10">Our Services</span>
    </h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">01</span>
        <h4 class="text-xl font-semibold">Fitness Training</h4>
        <p class="text-[#94a3b8]">Build strength and endurance with our targeted training programs.</p>
      </div>
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">02</span>
        <h4 class="text-xl font-semibold">Yoga</h4>
        <p class="text-[#94a3b8]">Improve flexibility and mental clarity in every session.</p>
      </div>
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">03</span>
        <h4 class="text-xl font-semibold">Gymnastics</h4>
        <p class="text-[#94a3b8]">Boost coordination and core strength through fun exercises.</p>
      </div>
    </div>
  </div>
</section>

<!-- Popular Classes -->
<section id="class" class="py-20">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold leading-tight relative">
      Explore Popular Classes
      <span class="absolute -top-12 text-[6rem] font-extrabold leading-[6rem] text-black/5">Popular Classes</span>
    </h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">
      <div class="p-6 border border-[#e2e8f0] shadow hover:shadow-lg transition space-y-3">
        <h4 class="text-lg font-bold text-[#020617] mb-1">Body Building</h4>
        <span class="text-[#42c8c9] font-semibold text-xl">$35</span>
        <p class="text-[#94a3b8]">High-intensity strength training to sculpt your body.</p>
      </div>
    </div>
  </div>
</section>

<!-- Facilities Section -->
<section class="relative py-20 overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-r from-[#eeb5c4] via-[#beb0e1] to-[#7ed6d8] z-0"></div>
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 relative z-10">
    <div>
      <h2 class="text-3xl font-bold text-white relative">
        Our Top-Class Facilities
        <span class="absolute -top-12 text-[6rem] font-extrabold text-white/20">Facilities</span>
      </h2>
      <p class="text-white mt-4">Premium gym equipment, clean locker rooms, and more.</p>
    </div>
    <div>
      <img src="/assets/gym.jpg" alt="Facility" class="w-full h-auto rounded-lg" />
    </div>
  </div>
</section>

<!-- Mentor Section -->
<section class="py-20">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold leading-tight relative">
      Meet Our Mentors
      <span class="absolute -top-12 text-[6rem] font-extrabold text-black/5">Best Team</span>
    </h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
      <div class="text-center">
        <img src="/assets/trainer1.jpg" alt="Mentor" class="mb-4 rounded-2xl mx-auto" />
        <h4 class="text-xl font-bold text-[#020617]">Alex Johnson</h4>
        <p class="text-[#94a3b8]">Strength Coach</p>
      </div>
    </div>
  </div>
</section>

<!-- Banner Section -->
<section class="relative py-20 overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-r from-[#eeb5c6] via-[#b2b4e4] to-[#b3b4e4] z-0"></div>
  <div class="max-w-[1200px] mx-auto px-4 relative z-10">
    <h2 class="text-5xl font-bold text-white mb-4">Join Us Today</h2>
    <p class="text-white text-lg">Become part of our fitness family. <a href="#" class="underline">Click here</a> to get started!</p>
  </div>
</section>

<!-- Footer -->
<footer class="bg-[#020617] text-white py-10">
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-3 gap-8">
    <div>
      <img src="/assets/logo-light.png" alt="Logo" class="mb-4 max-w-[200px]" />
      <p class="text-[#94a3b8]">© 2025 FitnessPoint. All rights reserved.</p>
    </div>
    <div>
      <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
      <ul class="space-y-2">
        <li><a href="#home" class="text-[#94a3b8] hover:text-white">Home</a></li>
        <li><a href="#about" class="text-[#94a3b8] hover:text-white">About</a></li>
        <li><a href="#service" class="text-[#94a3b8] hover:text-white">Services</a></li>
        <li><a href="#class" class="text-[#94a3b8] hover:text-white">Classes</a></li>
      </ul>
    </div>
    <div>
      <h4 class="text-lg font-semibold mb-4">Contact</h4>
      <ul class="space-y-2">
        <li class="text-[#94a3b8]">123 Gym St, FitCity</li>
        <li class="text-[#94a3b8]">info@fitnesspoint.com</li>
        <li class="text-[#94a3b8]">+62 812 3456 7890</li>
      </ul>
    </div>
  </div>
</footer>
@endsection
