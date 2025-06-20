@extends('layouts.layout')

@section('title', 'Aktivitas Dewasa Hari ke-' . $hari)

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Hari ke-{{ $hari }}</h1>
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">{{ $activity }}</h2>
        <p class="text-gray-700">
            Deskripsi aktivitas hari ini: <strong>{{ $activity }}</strong>. Silakan lakukan aktivitas ini selama 30-45 menit dengan penuh semangat dan konsistensi.
        </p>
    </div>
    <div class="mt-6 text-center">
        <a href="{{ url('/program/dewasa') }}" class="text-blue-500 hover:underline">Kembali ke Kalender</a>
    </div>
</div>
@endsection
