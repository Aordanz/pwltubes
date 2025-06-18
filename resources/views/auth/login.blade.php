<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Akses Kesehatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300 min-h-screen flex items-center justify-center">

    <div class="bg-white text-gray-800 p-8 rounded-2xl shadow-2xl w-full max-w-md border-t-8 border-blue-600">
        <div class="flex flex-col items-center mb-6">
           
            <h2 class="text-3xl font-bold text-center text-blue-700 flex items-center gap-2">
                <i data-feather="heart" class="w-6 h-6 text-blue-600"></i> Portal Kesehatan
            </h2>
            <p class="text-sm text-gray-500 mt-1">Masuk untuk memulai hidup yang sehat</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-3 rounded mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm mb-1 text-blue-800 font-medium">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-2 bg-blue-50 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm mb-1 text-blue-800 font-medium">Kata Sandi</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2 bg-blue-50 border border-blue-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition px-4 py-2 rounded-lg font-semibold text-white">
                Masuk
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">Daftar di sini</a>
        </p>
    </div>

    <script>
        feather.replace()
    </script>
</body>
</html>
