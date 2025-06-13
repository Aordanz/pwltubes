@extends('layouts.layout')

@section('title', 'Detail Aktivitas')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MyApp' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-4xl mx-auto p-6">
        <h2 class="text-3xl font-bold text-center text-[#065f46] mb-4">Detail Aktivitas Hari ke-{{ $id }}</h2>
    
        <div class="border p-5 rounded-lg shadow bg-white">
            <h3 class="text-2xl font-semibold text-[#0f172a]">Aktivitas: {{ $activity }}</h3>
    
            @if($activity == 'Rest Day')
                <p class="text-gray-700 mt-4">Hari ini adalah hari istirahat. Jangan lupa untuk merilekskan tubuh dan pikiran Anda.</p>
                <img src="https://source.unsplash.com/400x250/?rest,day" class="rounded mt-4" alt="Rest Day">
            @else
                <p class="text-gray-700 mt-4">Aktivitas yang perlu dilakukan hari ini: <strong>{{ $activity }}</strong>.</p>
                <img src="https://source.unsplash.com/400x250/?exercise,day" class="rounded mt-4" alt="{{ $activity }}">
            @endif
        </div>
    </div>
</body>
</html>
@endsection
