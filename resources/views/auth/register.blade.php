<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-8 rounded-xl shadow-lg w-full max-w-md text-white">
        <h2 class="text-3xl font-bold mb-6 text-center">Buat Akun Baru</h2>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
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
                <label for="name" class="block mb-1 font-semibold">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <div>
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <div>
                <label for="password" class="block mb-1 font-semibold">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <div>
                <label for="password_confirmation" class="block mb-1 font-semibold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <!-- Tambahkan dropdown Role -->
            <div>
                <label for="jenis_kelamin" class="block mb-1 font-semibold">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2">
                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Field Usia, tampil jika role user -->
           <div>
    <label for="age_category" class="block mb-1 font-semibold">Rentang Usia</label>
    <select name="age_category" id="age_category" required
        class="w-full rounded border-gray-300 text-gray-900 p-2">
        <option value="" disabled selected>Pilih rentang usia</option>
        <option value="remaja" {{ old('age_category') == 'remaja' ? 'selected' : '' }}>Remaja (13-25)</option>
        <option value="dewasa" {{ old('age_category') == 'dewasa' ? 'selected' : '' }}>Dewasa (26-49)</option>
        <option value="lansia" {{ old('age_category') == 'lansia' ? 'selected' : '' }}>Lansia (50+)</option>
    </select>
</div>

<button type="submit"
    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold p-3 rounded">Register</button>
</form>
</div>

>
</body>
</html>
