<!-- Navbar BetterHelp Style -->
<div class="fixed top-0 left-0 w-full z-50 bg-white/65 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <!-- KIRI: Logo & Menu -->
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600 hover:text-indigo-800 transition">Simpus Medical</a>
            <a href="#about" class="text-gray-600 hover:text-indigo-500 transition hidden md:inline">About</a>

            <!-- Dropdown Konsultasi -->
            <div class="relative group hidden md:inline">
                <button class="text-gray-600 hover:text-indigo-500 transition focus:outline-none">
                    Konsultasi
                </button>
                <!-- (Opsional: tambahkan dropdown isi di sini jika diperlukan) -->
            </div>
        </div>

        <!-- KANAN: Auth -->
        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-500 transition">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700 transition">Get Started</a>
            @else
                <span class="text-gray-600 text-sm">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600 transition">Logout</button>
                </form>
            @endguest
        </div>

        <!-- HAMBURGER untuk Mobile -->
        <div class="md:hidden">
            <button id="menu-toggle" class="text-gray-700 focus:outline-none">
                <!-- Icon Hamburger -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pt-2 pb-4 bg-white border-t">
        <a href="#about" class="block py-2 text-gray-600 hover:text-indigo-500">About</a>
        <a href="#" class="block py-2 text-gray-600 hover:text-indigo-500">Konsultasi</a>
        @guest
            <a href="{{ route('login') }}" class="block py-2 text-gray-600 hover:text-indigo-500">Login</a>
            <a href="{{ route('register') }}" class="block py-2 text-indigo-600 hover:text-indigo-700 font-medium">Get Started</a>
        @else
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block w-full text-left py-2 text-red-500 hover:text-red-700">Logout</button>
            </form>
        @endguest
    </div>
</div>

<!-- Script Toggle Mobile -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
