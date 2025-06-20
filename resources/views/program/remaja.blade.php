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
</head>
<body class="bg-gray-100 font-sans pt-32">

<header class="pt-32 pb-20 bg-[#e2e8f0]">
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 items-center gap-8">
    <div class="text-center md:text-left">
      <h1 class="text-5xl font-extrabold italic text-[#38bdf8] leading-tight">
        HIDUP SEHAT UNTUK HIDUP BAHAGIA
      </h1>
      <h2 class="text-4xl font-extrabold italic text-[#0f172a] mt-6">KESEHATAN ADALAH PRIORITAS</h2>
      <p class="text-[#475569] mt-4">Hidup sehat adalah tanggung jawab diri kita dalam merawat tubuh dan pikiran.</p>
      <div class="mt-6">
        <button class="bg-[#0f172a] hover:bg-[#38bdf8] text-white px-6 py-3 rounded">Pelajari Lebih Lanjut</button>
      </div>
    </div>
    <div>
      <img src="{{ asset('images/logo_simpus.png') }}" alt="header" class="float-right -mt-2 max-w-[400px] rounded-xl" />
    </div>
  </div>
</header>

<section id="class" class="py-20 bg-gray-50 text-black">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Kalender Aktivitas 30 Hari</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
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
    </div>
  </div>
</section>

{{-- Notifikasi --}}
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
          document.getElementById('notification').classList.remove('hidden');
          setTimeout(() => {
            document.getElementById('notification').classList.add('hidden');
          }, 3000);
        }
      });
    }
  }
</script>

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
    </div>
  </div>
</footer>

</body>
</html>
@endsection
