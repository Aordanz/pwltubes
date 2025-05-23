<nav class="fixed top-0 left-0 w-full z-50 bg-[#020617] text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">
            <!-- Logo dan Navigasi -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-400 hover:text-indigo-300">Simpus Medical</a>
                <a href="{{ route('about') }}" class="hover:text-indigo-300">About</a>
                <a href="#" class="hover:text-indigo-300">Konsultasi</a>
            </div>

            <!-- Login/Register/User -->
            <div class="flex items-center space-x-3">
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-1 border border-indigo-500 text-indigo-400 rounded hover:bg-indigo-500 hover:text-white transition">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Register</a>
                @else
                    <span class="text-sm text-gray-300">Halo, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
