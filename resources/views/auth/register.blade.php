<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi | Portal Kesehatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        body {
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <div class="bg-white/60 p-8 rounded-3xl shadow-2xl w-full max-w-md text-white border-t-8 border-blue-600">
        <div class="text-center mb-6">
            <div class="flex items-center justify-center">
                <img src="{{ asset('images/logo_simpus.png') }}" alt="header" class="float-right -mt-2 max-w-[150px]" />
            </div>
            <h2 class="text-3xl font-bold text-black">Daftar Akun Kesehatan</h2>
            <p class=" text-black">Mulai pantau dan jaga kesehatanmu</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded-xl mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm mb-1 font-semibold text-black">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full rounded-xl border-gray-300 bg-white/70 text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="email" class="block text-sm mb-1 font-semibold text-black">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full rounded-xl border-gray-300 bg-white/70 text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="password" class="block text-sm mb-1 font-semibold text-black">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full rounded-xl border-gray-300 bg-white/70 text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm mb-1 font-semibold text-black">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full rounded-xl border-gray-300 bg-white/70 text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="jenis_kelamin" class="block text-sm mb-1 font-semibold text-black">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                    class="w-full rounded-xl border-gray-300 bg-white/70 text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label for="age_category" class="block text-sm mb-1 font-semibold text-black">Rentang Usia</label>
                <select name="age_category" id="age_category" required
                    class="w-full rounded-xl border-gray-300 bg-white/70 text-gray-900 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="" disabled selected>Pilih rentang usia</option>
                    <option value="remaja" {{ old('age_category') == 'remaja' ? 'selected' : '' }}>Remaja (13–25)</option>
                    <option value="dewasa" {{ old('age_category') == 'dewasa' ? 'selected' : '' }}>Dewasa (26–49)</option>
                    <option value="lansia" {{ old('age_category') == 'lansia' ? 'selected' : '' }}>Lansia (50+)</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition p-3 rounded-xl text-white font-semibold">
                Daftar Sekarang
            </button>
                    <p class="mt-4 text-center text-black">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-semibold">Masuk di sini</a>
        </p>
        </form>
    </div>

    <script>
        feather.replace()
    </script>
</body>
</html>
