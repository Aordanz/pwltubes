@extends('layouts.layout')

@section('title', 'Detail Aktivitas Remaja')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    <a href="{{ url()->previous() }}" class="text-blue-500 hover:underline mb-4 inline-block">← Kembali ke daftar</a>

    <h2 class="text-3xl font-bold mb-4 text-gray-800">Hari ke-{{ $activity->hari }}</h2>

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-green-700">Aktivitas 1:</h3>
        <p class="text-gray-700 mb-2">{{ $activity->program_1 }}</p>
        <p class="text-gray-600">{{ $activity->deskripsi_1 }}</p>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-green-700">Aktivitas 2:</h3>
        <p class="text-gray-700 mb-2">{{ $activity->program_2 }}</p>
        <p class="text-gray-600">{{ $activity->deskripsi_2 }}</p>
    </div>

    @if ($activity->video)
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Video Aktivitas</h3>
            <video controls class="w-full rounded">
                <source src="{{ asset('storage/' . $activity->video) }}" type="video/mp4">
                Browser Anda tidak mendukung tag video.
            </video>
        </div>
    @endif
</div>
@endsection
