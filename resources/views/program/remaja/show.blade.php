@extends('layouts.layout')

{{-- Judul halaman dinamis berdasarkan hari --}}
@section('title', 'Aktivitas Hari ke-' . $activity->hari)

@section('content')
<div class="bg-gray-100 font-sans min-h-screen">
    {{-- Header Halaman --}}
    <header class="bg-gradient-to-r from-teal-500 to-cyan-500 pt-32 pb-16 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-5xl font-extrabold tracking-tight">Aktivitas Hari ke-{{ $activity->hari }}</h1>
            <p class="mt-4 text-xl text-teal-100">Berikut adalah panduan lengkap untuk aktivitas Anda hari ini.</p>
        </div>
    </header>

    {{-- Konten Detail Aktivitas --}}
    <main class="py-12">
        <div class="max-w-7xl mx-auto px-4">

            {{-- Logika untuk menampilkan kartu normal atau kartu istirahat --}}
            @if(strtolower($activity->aktivitas_pagi) === 'hari istirahat' || strtolower($activity->aktivitas_sore) === 'hari istirahat')
                {{-- TAMPILAN KHUSUS UNTUK HARI ISTIRAHAT --}}
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden p-8 md:p-12 text-center flex flex-col items-center justify-center h-96">
                    <img src="https://placehold.co/100x100/10b981/ffffff?text=Zzz" alt="Ikon Istirahat" class="rounded-full mb-6">
                    <h2 class="text-4xl font-bold text-gray-800">Hari Istirahat</h2>
                    <p class="text-lg text-gray-600 mt-4 max-w-xl">
                        Hari ini adalah waktu untuk pemulihan. Gunakan waktu ini untuk beristirahat, meregangkan tubuh dengan ringan, dan memastikan tubuh Anda siap untuk aktivitas selanjutnya.
                    </p>
                </div>
            @else
                {{-- TAMPILAN DUA KARTU UNTUK HARI NORMAL --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    <!-- Kartu 1: Aktivitas Pagi -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col">
                        <div class="p-6 bg-teal-50">
                            <h2 class="text-2xl font-bold text-teal-800">Aktivitas Pagi</h2>
                        </div>
                        
                        {{-- Video Pagi --}}
                        @if($activity->video)
                            <div class="w-full aspect-video bg-black">
                                <video class="w-full h-full" controls preload="metadata">
                                    <source src="{{ asset($activity->video) }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            </div>
                        @else
                            <div class="w-full aspect-video bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-500">Video tidak tersedia</p>
                            </div>
                        @endif

                        <div class="p-6 flex-grow">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $activity->aktivitas_pagi }}</h3>
                            <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed">
                                {!! nl2br(e($activity->deskripsi_1)) !!}
                            </div>
                        </div>
                    </div>

                    <!-- Kartu 2: Aktivitas Sore -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col">
                        <div class="p-6 bg-sky-50">
                            <h2 class="text-2xl font-bold text-sky-800">Aktivitas Sore</h2>
                        </div>

                        {{-- Video Sore --}}
                        @if($activity->video2)
                             <div class="w-full aspect-video bg-black">
                                <video class="w-full h-full" controls preload="metadata">
                                    <source src="{{ asset($activity->video2) }}" type="video/mp4">
                                    Browser Anda tidak mendukung tag video.
                                </video>
                            </div>
                        @else
                             <div class="w-full aspect-video bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-500">Video tidak tersedia</p>
                            </div>
                        @endif

                        <div class="p-6 flex-grow">
                             <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $activity->aktivitas_sore }}</h3>
                            <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed">
                                {!! nl2br(e($activity->deskripsi_2)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- ========================================================== --}}
            {{-- BAGIAN BARU: Tombol Aksi Selesai --}}
            {{-- ========================================================== --}}
            <div class="mt-12 text-center p-8 bg-white rounded-2xl shadow-xl">
                {{-- PERBAIKAN: Ditambahkan 'isset($isCompleted)' untuk mencegah error --}}
                @if (isset($isCompleted) && $isCompleted)
                    {{-- Jika sudah selesai, tampilkan badge hijau --}}
                    <div class="inline-flex items-center bg-green-100 text-green-800 font-bold py-3 px-6 rounded-lg text-lg">
                        <i class="ri-checkbox-circle-fill mr-2 text-2xl"></i>
                        Anda Sudah Menyelesaikan Aktivitas Ini
                    </div>
                @else
                    {{-- Jika belum selesai, tampilkan form dengan tombol --}}
                    <form action="{{ route('activity.complete') }}" method="POST">
                        @csrf
                        {{-- Kirim data tersembunyi --}}
                        <input type="hidden" name="hari" value="{{ $activity->hari }}">
                        <input type="hidden" name="kategori" value="remaja"> 

                        <button type="submit" class="inline-flex items-center bg-blue-600 text-white hover:bg-blue-700 font-bold py-3 px-6 rounded-lg transition-transform hover:scale-105 shadow-md text-lg">
                            <i class="ri-check-double-line mr-2 text-2xl"></i>
                            Saya Sudah Melakukan Aktivitas Ini
                        </button>
                    </form>
                @endif
            </div>
            {{-- ========================================================== --}}

            {{-- Tombol Kembali --}}
            <div class="mt-8 text-center">
                <a href="{{ route('program.remaja') }}" 
                   class="inline-flex items-center bg-gray-700 text-white hover:bg-gray-800 font-bold py-3 px-6 rounded-lg transition-colors shadow-md">
                    <i class="ri-arrow-left-s-line mr-2 text-xl"></i>
                    Kembali ke Kalender
                </a>
            </div>
        </div>
    </main>
</div>
@endsection
