<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - MyApp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 space-y-6">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
            <p class="text-sm text-gray-500">Please login to your account</p>
        </div>
        
        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required autofocus
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm">
                    <input type="checkbox" name="remember" class="form-checkbox text-blue-500">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition duration-200">
                Login
            </button>
        </form>

        <div class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Sign up</a>
        </div>
    </div>
</body>
</html>
