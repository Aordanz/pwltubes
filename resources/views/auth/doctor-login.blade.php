<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <form method="POST" action="{{ route('doctor.login') }}" class="bg-white p-6 rounded shadow w-96">
        @csrf
        <h2 class="text-2xl font-bold mb-4">Login Dokter</h2>

        @if($errors->any())
            <div class="text-red-500 mb-2">{{ $errors->first() }}</div>
        @endif

        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block">Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">Login</button>
    </form>
</body>
</html>
