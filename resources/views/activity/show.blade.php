@extends('layouts.layout')

@section('title', 'Detail Aktivitas')

@section('content')
<div class="max-w-5xl mx-auto pt-32 px-6">
    <h2 class="text-3xl font-bold text-center text-[#065f46] mb-8">Detail Aktivitas Hari ke-{{ $id }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Aktivitas Pagi --}}
        <div class="border p-5 rounded-lg shadow bg-white">
            <h3 class="text-2xl font-semibold text-[#0f172a] mb-2">Aktivitas Pagi</h3>
            @if($morning === 'Rest Day')
                <p class="text-gray-700">Pagi ini adalah waktu istirahat.</p>
                <img src="https://source.unsplash.com/400x250/?relax,morning" class="rounded mt-4" alt="Rest Day">
            @else
                <p class="text-gray-700">Aktivitas yang perlu dilakukan pagi ini: <strong>{{ $morning }}</strong>.</p>
                <img src="https://source.unsplash.com/400x250/?{{ urlencode($morning) }},morning" class="rounded mt-4" alt="{{ $morning }}">
            @endif
        </div>

        {{-- Aktivitas Sore --}}
        <div class="border p-5 rounded-lg shadow bg-white">
            <h3 class="text-2xl font-semibold text-[#0f172a] mb-2">Aktivitas Sore</h3>
            @if($evening === 'Rest Day')
                <p class="text-gray-700">Sore ini adalah waktu istirahat.</p>
                <img src="https://source.unsplash.com/400x250/?relax,evening" class="rounded mt-4" alt="Rest Day">
            @else
                <p class="text-gray-700">Aktivitas yang perlu dilakukan sore ini: <strong>{{ $evening }}</strong>.</p>
                <img src="https://source.unsplash.com/400x250/?{{ urlencode($evening) }},evening" class="rounded mt-4" alt="{{ $evening }}">
            @endif
        </div>
    </div>
</div>
@endsection
