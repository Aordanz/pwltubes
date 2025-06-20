@extends('layouts.layout')

@section('title', 'Program Dewasa')

@section('content')
<!-- Header Section -->
<header id="home" class="pt-32 pb-20 bg-[#e2e8f0]">
  <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 items-center gap-8">
    <div class="text-center md:text-left">
      <h1 class="text-5xl font-extrabold italic text-[#38bdf8] leading-tight">
        HIDUP SEHAT UNTUK HIDUP BAHAGIA
      </h1>
      <h2 class="text-4xl font-extrabold italic text-[#0f172a] mt-6">KESEHATAN ADALAH PRIORITAS</h2>
      <p class="text-[#475569] mt-4">
        Hidup sehat merupakan tanggung jawab diri kita bagaimana kita merawat tubuh dan pikiran kita serta menjaga kesehatan tubuh kita.
      </p>
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
    <div class="relative">
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-green-100 rounded-full -z-10 blur-2xl"></div>
      <img src="{{ asset('images/gayahidup.jpg') }}" alt="about" class="rounded-lg mx-auto mr-50" />
    </div>
    <div>
      <h2 class="text-3xl font-bold text-[#065f46]">Mengapa Kesehatan Itu Penting?</h2>
      <p class="mt-4 text-gray-600">
        Kesehatan merupakan salah satu aspek paling penting dalam kehidupan manusia karena tanpa kesehatan yang baik, berbagai aktivitas dan tujuan hidup menjadi sulit untuk dicapai.
      </p>
      <p class="mt-3 text-gray-600">
        Selain itu, kesehatan yang baik juga mendukung produktivitas, membantu mengurangi stres, dan meningkatkan kualitas hidup secara keseluruhan.
      </p>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="service" class="py-20 bg-[#020617] text-white">
  <div class="max-w-[1200px] mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold leading-tight">Manfaat Gaya Hidup Sehat Bagi Dewasa</h2>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">01</span>
        <h4 class="text-xl font-semibold">Mencegah Penyakit Kronis</h4>
        <p class="text-[#94a3b8]">Membantu menjaga tekanan darah, kadar gula darah, dan kolesterol tetap normal.</p>
      </div>
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">02</span>
        <h4 class="text-xl font-semibold">Menjaga Kesehatan Mental</h4>
        <p class="text-[#94a3b8]">Meningkatkan energi harian serta kestabilan suasana hati.</p>
      </div>
      <div class="space-y-2">
        <span class="text-2xl font-extrabold text-white/75">03</span>
        <h4 class="text-xl font-semibold">Memperkuat Sistem Imun</h4>
        <p class="text-[#94a3b8]">Gaya hidup aktif memperkuat daya tahan tubuh.</p>
      </div>
    </div>
  </div>
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


<!-- Chat Section -->
<section class="py-20 bg-blue-600 text-white">
  <div class="max-w-[1200px] mx-auto px-4">
    <h2 class="text-3xl font-bold mb-8">Diskusikan dengan Ahli Kami</h2>
    <div class="flex flex-wrap gap-6">
      <div onclick="openChat('Nicolas Purba', 1)" class="cursor-pointer bg-white p-4 rounded-lg text-black w-60 text-center shadow">
        <img src="{{ asset('assets/trainer1.jpg') }}" class="mb-3 rounded-xl w-full h-40 object-cover" />
        <h4 class="font-bold">Nicolas Purba</h4>
        <p class="text-sm text-gray-600">Mentor Kesehatan</p>
      </div>
    
    </div>
  </div>
</section>

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

@endsection
