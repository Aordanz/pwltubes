@extends('layouts.layout')

@section('content')
<div class="min-h-screen py-12 px-6 flex flex-col items-center justify-center" style="background: linear-gradient(to right, #cce5ff, #e6f2ff);">

    <div class="w-full max-w-3xl bg-white bg-opacity-90 rounded-2xl shadow-2xl border border-gray-200 p-8 mt-36">

        <!-- Header Logo + Judul -->
        <div class="flex items-center justify-center space-x-4 mb-8">
            <img src="{{ asset('images/logo_simpus.png') }}" alt="Simpus" class="w-20">
            <h2 class="text-3xl font-extrabold text-indigo-800">Profil Saya</h2>
        </div>

        @if(session('success'))
            <div class="p-4 mb-6 text-green-800 bg-green-100 rounded-lg border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil</label>
                <div class="flex items-center space-x-4">
                    @if($user->photo)
                        <img src="{{ $user->photo }}" class="w-20 h-20 rounded-full object-cover border-2 border-indigo-500 shadow">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" class="w-20 h-20 rounded-full object-cover border-2 border-gray-300">
                    @endif
                    <input type="file" name="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-700
                        hover:file:bg-indigo-100"/>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password Baru</label>
                <input type="password" name="password" class="block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition">
                <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="block w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-indigo-400 focus:outline-none transition">
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('program.dewasa') }}" class="inline-flex items-center px-5 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                    ← Kembali
                </a>
                <button type="submit" class="inline-flex items-center px-6 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 transition">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
