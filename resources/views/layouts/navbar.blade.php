<nav class="bg-gray-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Kiri: Logo & Menu -->
<div class="flex items-center space-x-6">
    <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-400 hover:text-indigo-300">MyApp</a>
    <a href="{{ route('home') }}" class="hover:text-indigo-300">Home</a>
    <a href="{{ route('program.remaja') }}" class="hover:text-indigo-300">Program Remaja</a>
    <a href="{{ route('program.dewasa') }}" class="hover:text-indigo-300">Program Dewasa</a>
    <a href="{{ route('program.lansia') }}" class="hover:text-indigo-300">Program Lansia</a>
    <a href="{{ route('about') }}" class="hover:text-indigo-300">About</a>
</div>

            <!-- Kanan: Auth Links -->
            <div class="space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-1 border border-indigo-500 text-indigo-400 rounded hover:bg-indigo-500 hover:text-white transition">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Register</a>
                @else
                    <div class="relative group">
                        <button class="text-sm text-gray-300 hover:text-white focus:outline-none">
                            Halo, {{ Auth::user()->name }}
                        </button>
                        <div class="absolute right-0 mt-2 w-32 bg-white text-black rounded shadow-lg hidden group-hover:block">
                            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 hover:bg-gray-100">
                                @csrf
                                <button type="submit" class="w-full text-left">Logout</button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>


        </div>

        <!-- Mobile Menu Items -->
        <div id="mobile-menu" class="md:hidden hidden mt-2 space-y-2">
            <a href="{{ route('about') }}" class="block px-2 py-1 hover:text-indigo-300">About</a>
            <a href="#" class="block px-2 py-1 hover:text-indigo-300">Konsultasi</a>
            @guest
                <a href="{{ route('login') }}" class="block px-2 py-1 hover:text-indigo-300">Login</a>
                <a href="{{ route('register') }}" class="block px-2 py-1 hover:text-indigo-300">Register</a>
            @else
                <form action="{{ route('logout') }}" method="POST" class="px-2 py-1">
                    @csrf
                    <button type="submit" class="text-left w-full hover:text-red-500">Logout</button>
                </form>
            @endguest
        </div>
    </div>
</nav>
