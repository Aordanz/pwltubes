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
        <img src="{{ asset('images/dewa.png') }}" alt="Tentang Kami" class="w-full object-cover" />
      </div>
    </div>

<!-- Text Section -->
<div data-aos="fade-left">
  <h2 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6 text-sky-800">
    Mengapa <span class="text-sky-600">Kesehatan</span> Penting bagi Orang Dewasa?
  </h2>
  <p class="text-lg text-gray-700 leading-relaxed mb-4">
    Di usia dewasa, tubuh menghadapi tekanan fisik dan mental dari rutinitas harian, pekerjaan, serta tanggung jawab hidup. Menjalani pola hidup sehat membantu menjaga energi, fokus, dan performa tubuh agar tetap optimal.
  </p>
  <p class="text-lg text-gray-700 leading-relaxed">
    Dengan asupan nutrisi seimbang, olahraga teratur, serta manajemen stres yang baik, orang dewasa dapat mencegah penyakit kronis seperti diabetes, jantung, dan tekanan darah tinggi, sekaligus menjaga kestabilan emosi dan kesehatan mental.
  </p>
  <div class="mt-8">
    <h4 class="text-xl md:text-2xl italic font-semibold text-sky-800 bg-gray-300 px-4 py-2 rounded-lg inline-block">
      “Pola Hidup Sehat Adalah Kunci Menjalani Hidup Dewasa dengan Lebih Berkualitas”
    </h4>
  </div>
</div>

    </div>
  </div>
</section>

<!-- Services Section Modern Teal-Aqua -->
<section id="service" class="py-20 bg-gradient-to-r from-blue-500 via-blue-500 to-blue-500 text-white">
  <div class="max-w-[1200px] mx-auto px-6 text-center relative z-10">
    <h2 class="text-4xl font-extrabold mb-4 tracking-tight">Manfaat Gaya Hidup Sehat Bagi Dewasa</h2>
    <p class="text-teal-100 max-w-2xl mx-auto text-lg">
      Gaya hidup sehat berdampak besar pada kualitas hidup orang dewasa. Berikut manfaat utamanya:
    </p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 mt-16">
      <!-- Card 1 -->
      <div class="bg-white/5 backdrop-blur-md border border-white/50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Mencegah Penyakit Kronis</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Membantu menjaga tekanan darah, kadar gula darah, dan kolesterol tetap normal.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white/5 backdrop-blur-md border border-white/50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Menjaga Kesehatan Mental</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Meningkatkan energi harian serta kestabilan suasana hati.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white/5 backdrop-blur-md border border-white/50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition duration-300 text-left">
        <div class="flex items-center space-x-4 mb-4">
          <div class="text-3xl font-bold text-teal-300"></div>
          <h4 class="text-xl font-semibold text-white">Memperkuat Sistem Imun</h4>
        </div>
        <p class="text-teal-100 text-sm leading-relaxed">
          Gaya hidup aktif memperkuat daya tahan tubuh.
        </p>
      </div>
    </div>
  </div>

  <!-- Decorative Gradient Circles -->
  <div class="absolute w-[400px] h-[400px] bg-teal-300 opacity-10 rounded-full -top-20 -left-40 blur-3xl"></div>
  <div class="absolute w-[300px] h-[300px] bg-teal-500 opacity-10 rounded-full bottom-0 right-0 blur-2xl"></div>
</section>

<!-- Kalender Aktivitas -->
<section id="class" class="py-20 bg-gray-50 text-black">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Kalender Aktivitas 30 Hari untuk Dewasa</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      
      @foreach($activities as $index => $activity)
      <a href="{{ route('activity.dewasa.show', ['id' => $loop->index + 1]) }}" class="block">
          <div class="relative border p-5 rounded-lg shadow hover:shadow-lg transition {{ ($index + 1) % 4 == 0 ? 'bg-yellow-100' : 'bg-white' }}">

              <form method="POST" action="{{ route('program.terpenuhi', ['kategori' => 'dewasa']) }}" class="absolute top-2 right-2">
                  @csrf
                  <input type="hidden" name="hari" value="{{ $index + 1 }}">
                  <input type="checkbox" id="checkbox-{{ $index }}" onchange="markComplete({{ $index }})" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-0 cursor-pointer">
              </form>

              <div class="flex justify-between items-center mb-2">
                  <span class="text-sm font-semibold text-gray-500">Hari ke-{{ $index + 1 }}</span>
                  <span class="bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded-full">
                      @if(($index + 1) % 4 == 0)
                          Istirahat
                      @else
                          {{ $activity }}
                      @endif
                  </span>
              </div>

              <img src="{{ ($index + 1) % 4 == 0 ? 'https://source.unsplash.com/400x250/?relax,day' : 'https://source.unsplash.com/400x250/?fitness,adult' }}" class="rounded mb-3" alt="Aktivitas Hari {{ $index + 1 }}">

              <p class="text-gray-700 text-sm">
                  @if(($index + 1) % 4 == 0)
                    Hari ke-{{ $index + 1 }} adalah hari istirahat untuk menjaga kebugaran.
                  @else
                    Aktivitas hari ke-{{ $index + 1 }} untuk dewasa: {{ $activity }}.
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


<!-- Mentor Section - Compact & Centered Avatar -->
<section class="py-20 bg-gradient-to-r from-blue-500 via-blue-500 to-blue-500 text-white">
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
  <div id="chatMessages" class="h-64 overflow-y-auto border p-2 mb-2 bg-gray-100 rounded text-sm"></div>
  <div class="flex">
    <input type="text" id="chatInput" class="flex-1 border rounded-l px-2 py-1 mr-2" placeholder="Ketik pesan...">
    <button onclick="sendMessage()" class="bg-blue-500 text-white px-4 rounded-r">Kirim</button>
  </div>
</div>

<script>
let selectedMentorId = null;
let selectedMentorName = '';

function openChat(mentorName, mentorId) {
    selectedMentorId = mentorId;
    selectedMentorName = mentorName;

    document.getElementById('chatBox').classList.remove('hidden');
    document.getElementById('mentorName').innerText = `Chat dengan ${mentorName}`;
    document.getElementById('chatMessages').innerHTML = '';
    fetchMessages();
}

function closeChat() {
    document.getElementById('chatBox').classList.add('hidden');
    selectedMentorId = null;
}

function sendMessage() {
    const input = document.getElementById('chatInput');
    const message = input.value.trim();

    if (message === '' || !selectedMentorId) return;

    fetch("{{ route('chat.send') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({
            receiver_id: selectedMentorId,
            receiver_type: 'doctor',
            content: message
        })
    })
    .then(response => response.json())
    .then(data => {
        input.value = '';
        fetchMessages();
    });
}

function fetchMessages() {
    if (!selectedMentorId) return;

    fetch("{{ route('chat.fetch') }}")
        .then(response => response.json())
        .then(data => {
            const chatBox = document.getElementById('chatMessages');
            chatBox.innerHTML = '';
            data.forEach(msg => {
                if ((msg.sender_type === 'user' && msg.receiver_id === selectedMentorId) ||
                    (msg.receiver_type === 'user' && msg.sender_id === selectedMentorId)) {
                    chatBox.innerHTML += `
                        <div class="mb-1 ${msg.sender_type === 'user' ? 'text-right' : 'text-left'}">
                            <span class="inline-block px-2 py-1 rounded ${msg.sender_type === 'user' ? 'bg-blue-300' : 'bg-gray-300'}">
                                ${msg.content}
                            </span>
                        </div>
                    `;
                }
            });
            chatBox.scrollTop = chatBox.scrollHeight;
        });
}

// auto-refresh setiap 5 detik
setInterval(fetchMessages, 5000);
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

