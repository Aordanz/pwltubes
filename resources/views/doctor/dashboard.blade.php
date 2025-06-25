{{-- resources/views/doctor/dashboard.blade.php --}}
@extends('layouts.layout_doctor')

@section('content')
{{-- Latar belakang utama dibuat sedikit abu-abu (slate-50) agar kartu putih lebih menonjol --}}
<div class="bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto pt-24 sm:pt-32 pb-12 px-4 sm:px-6 lg:px-8">
        
        {{-- Header dengan Sedikit Penyesuaian --}}
        <div class="mb-10">
            <h1 class="text-4xl font-bold tracking-tight text-slate-800">Dashboard Dokter</h1>
            <p class="mt-2 text-lg text-slate-500">Selamat datang kembali, {{ auth()->user()->name }}.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Card Chat: Dibuat lebih interaktif --}}
            <div class="group bg-white border border-slate-200 shadow-md rounded-xl p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <a href="{{ route('doctor.chat') }}" class="block">
                    <div class="flex items-start justify-between">
                        {{-- Konten Teks --}}
                        <div>
                            <div class="flex items-center gap-3 mb-3">
                                {{-- Ikon Pesan --}}
                                <div class="bg-blue-100 text-blue-600 rounded-lg p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-slate-800">Pesan Masuk</h2>
                            </div>
                            <p class="text-slate-500">Lihat dan balas pesan dari admin secara langsung.</p>
                        </div>
                        {{-- Ikon Panah (Muncul saat hover di card) --}}
                        <div class="text-slate-400 transition-transform duration-300 group-hover:translate-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Card Informasi: Dibuat lebih ramah dan personal --}}
            <div class="bg-white border border-slate-200 shadow-md rounded-xl p-6">
                <div class="flex items-start gap-4">
                    {{-- Ikon Informasi --}}
                    <div class="bg-green-100 text-green-600 rounded-lg p-2 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-slate-800 mb-2">Platform Simpus Medical</h2>
                        <p class="text-slate-500">Periksa pesan Anda dan bantu pengguna dengan informasi yang dibutuhkan. Jaga selalu kerahasiaan data pasien.</p>
                    </div>
                </div>
            </div>

            {{-- Card Tambahan (Contoh): Anda bisa menambahkan card lain di sini --}}
            {{-- <div class="bg-white border border-slate-200 shadow-md rounded-xl p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">Jadwal Konsultasi</h2>
                <p class="text-gray-500">Lihat jadwal konsultasi Anda yang akan datang.</p>
            </div> --}}

        </div>
    </div>
</div>
@endsection