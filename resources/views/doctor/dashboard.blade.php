{{-- resources/views/doctor/dashboard.blade.php --}}
@extends('layouts.layout')

@section('content')
<div class="max-w-7xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Dokter</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Card Chat --}}
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Pesan Masuk</h2>
                <a href="{{ route('doctor.chat') }}" class="text-sm text-blue-600 hover:underline">Buka Chat</a>
            </div>
            <p class="text-gray-500">Kirim dan terima pesan dari admin secara langsung.</p>
        </div>

        {{-- Card Informasi --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Selamat Datang, {{ auth()->user()->name }}</h2>
            <p class="text-gray-500">Periksa pesan Anda dan bantu pengguna dengan informasi yang dibutuhkan.</p>
        </div>
    </div>
</div>
@endsection
