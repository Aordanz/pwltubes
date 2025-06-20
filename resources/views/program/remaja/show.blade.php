@extends('layouts.layout')

@section('title', 'Detail Aktivitas Remaja')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-4">Hari ke-{{ $aktivitas->hari }}</h2>

    <div class="mb-6">
        <h3 class="text-lg font-semibold">Program 1</h3>
        <p>{{ $aktivitas->program_1 }}</p>
        <p class="text-gray-600">{{ $aktivitas->deskripsi_1 }}</p>
    </div>

    @if($aktivitas->program_2)
    <div class="mb-6">
        <h3 class="text-lg font-semibold">Program 2</h3>
        <p>{{ $aktivitas->program_2 }}</p>
        <p class="text-gray-600">{{ $aktivitas->deskripsi_2 }}</p>
    </div>
    @endif

    @if($aktivitas->video)
    <div class="mt-6">
        <video controls class="w-full rounded">
            <source src="{{ asset('storage/' . $aktivitas->video) }}" type="video/mp4">
            Browser tidak mendukung pemutar video.
        </video>
    </div>
    @endif
</div>
@endsection
