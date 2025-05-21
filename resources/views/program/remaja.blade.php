@extends('layouts.layout')

@section('title', 'Program Remaja')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cara Hidup Sehat bagi Remaja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-green-600 p-4 flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            Remaja Sehat
        </div>
        <ul class="flex space-x-6 text-white">
            <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
            <li><a href="{{ route('program.remaja') }}" class="underline font-semibold">Program Remaja</a></li>
            <li><a href="{{ route('program.dewasa') }}" class="hover:underline">Program Dewasa</a></li>
            <li><a href="{{ route('program.lansia') }}" class="hover:underline">Program Lansia</a></li>
            <li>
                <a href="{{ route('chat.index') }}" class="hover:underline flex items-center gap-1">
                    <!-- Icon Chat -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 3.866-3.582 7-8 7a8.96 8.96 0 01-4.685-1.33L3 19l1.33-5.315A7.964 7.964 0 013 12c0-3.866 3.582-7 8-7s8 3.134 8 7z" />
                    </svg>
                    Chat
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main content -->
    <main class="max-w-4xl mx-auto p-6">

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-3">Pentingnya Hidup Sehat untuk Remaja</h2>
            <p class="text-lg leading-relaxed">
                Masa remaja adalah waktu yang penting untuk membangun kebiasaan hidup sehat yang akan berdampak pada kesehatan jangka panjang. Dengan pola hidup sehat, remaja dapat tumbuh dan berkembang dengan optimal serta terhindar dari berbagai penyakit.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-3">Tips Hidup Sehat bagi Remaja</h2>
            <ol class="list-decimal list-inside space-y-3 text-lg">
                <li><strong>Makan makanan bergizi:</strong> Konsumsi sayur, buah, protein, dan karbohidrat seimbang untuk memenuhi kebutuhan energi dan nutrisi tubuh.</li>
                <li><strong>Rutin berolahraga:</strong> Lakukan aktivitas fisik minimal 30 menit setiap hari, seperti jogging, bersepeda, atau senam.</li>
                <li><strong>Cukup tidur:</strong> Tidur 8-10 jam setiap malam agar tubuh dan otak dapat beristirahat dengan baik.</li>
                <li><strong>Minum air putih yang cukup:</strong> Hindari minuman manis atau berenergi secara berlebihan, dan pastikan tubuh terhidrasi dengan baik.</li>
                <li><strong>Hindari rokok dan alkohol:</strong> Jangan merokok dan mengonsumsi alkohol yang dapat merusak kesehatan tubuh.</li>
                <li><strong>Jaga kesehatan mental:</strong> Kelola stres dengan baik, bicarakan masalah dengan orang terpercaya, dan lakukan aktivitas yang menyenangkan.</li>
                <li><strong>Rajin menjaga kebersihan:</strong> Mandi teratur, sikat gigi dua kali sehari, dan cuci tangan sebelum makan.</li>
            </ol>
        </section>

        <section>
            <h2 class="text-2xl font-semibold mb-3">Kesimpulan</h2>
            <p class="text-lg leading-relaxed">
                Hidup sehat adalah investasi terbaik bagi remaja untuk masa depan yang cerah. Mulailah dari kebiasaan kecil sehari-hari yang konsisten untuk mendapatkan tubuh dan jiwa yang sehat.
            </p>
        </section>

    </main>

    <footer class="bg-green-600 text-white text-center p-4 mt-12">
        <p>© 2025 Remaja Sehat. Semua hak dilindungi.</p>
    </footer>

</body>
</html>
@endsection
