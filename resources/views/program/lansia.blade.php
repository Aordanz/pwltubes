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

</body>
</html>
@endsection