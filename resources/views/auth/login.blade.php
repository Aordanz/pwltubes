<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="bg-gray-800 text-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-bold text-center mb-6">Login</h2>

        @if (session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4 text-sm">
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
                <label for="email" class="block text-sm mb-1">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="password" class="block text-sm mb-1">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 transition px-4 py-2 rounded font-semibold">
                Masuk
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-400">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-400 hover:underline">Daftar di sini</a>
        </p>
    </div>

</body>
</html>
