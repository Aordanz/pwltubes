<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi | Portal Kesehatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-3xl shadow-xl w-full max-w-md text-gray-800 border-t-8 border-blue-600">
        <div class="text-center mb-6">
            <div class="flex items-center justify-center ">
                <img src="{{ asset('images/logo_simpus.png') }}" alt="header" class="float-right -mt-2 max-w-[150px] " />
             </div>
            <h2 class="text-3xl font-bold text-blue-700">Daftar Akun Kesehatan</h2>
            <p class="text-sm text-gray-500">Mulai pantau dan jaga kesehatanmu</p>
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
                <label for="name" class="block text-sm mb-1 font-semibold text-blue-900">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full rounded-xl border-gray-300 bg-blue-50 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="email" class="block text-sm mb-1 font-semibold text-blue-900">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full rounded-xl border-gray-300 bg-blue-50 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="password" class="block text-sm mb-1 font-semibold text-blue-900">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full rounded-xl border-gray-300 bg-blue-50 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm mb-1 font-semibold text-blue-900">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full rounded-xl border-gray-300 bg-blue-50 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <div>
                <label for="jenis_kelamin" class="block text-sm mb-1 font-semibold text-blue-900">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                    class="w-full rounded-xl border-gray-300 bg-blue-50 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label for="age_category" class="block text-sm mb-1 font-semibold text-blue-900">Rentang Usia</label>
                <select name="age_category" id="age_category" required
                    class="w-full rounded-xl border-gray-300 bg-blue-50 p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="" disabled selected>Pilih rentang usia</option>
                    <option value="remaja" {{ old('age_category') == 'remaja' ? 'selected' : '' }}>Remaja (13-25)</option>
                    <option value="dewasa" {{ old('age_category') == 'dewasa' ? 'selected' : '' }}>Dewasa (26-49)</option>
                    <option value="lansia" {{ old('age_category') == 'lansia' ? 'selected' : '' }}>Lansia (50+)</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition p-3 rounded-xl text-white font-semibold">
                Daftar Sekarang
            </button>
        </form>
    </div>

    <script>
        feather.replace()
    </script>
</body>
</html>
