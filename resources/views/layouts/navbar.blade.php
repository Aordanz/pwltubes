<!-- Navbar Oval Style -->
<div class="fixed top-3 left-1/2 transform -translate-x-1/2 z-50 padding-top">
    <div class="bg-white rounded-full shadow-lg backdrop-blur-sm bg-opacity-70 px-8 py-3 w-[95vw] max-w-7xl mx-auto flex items-center justify-between">
        
        <!-- KIRI: Menu Navigasi -->
        <div class="flex items-center space-x-6">
            <a href="{{ route('home') }}" class="text-2xl font-extrabold text-indigo-900">
                <span class="text-indigo-500">Simpus</span>
                <span class="text-sky-400">Medical</span>
            </a>

            <a href="#about" class="text-gray-600 hover:text-indigo-500 transition hidden md:inline">About</a>

            <!-- Dropdown Konsultasi -->
            <div class="relative group hidden md:inline">
                <a href="#konsultasi" class="text-gray-600 hover:text-indigo-500 transition focus:outline-none">
                    Konsultasi
                </button></a>
                <!-- (Opsional: tambahkan dropdown isi di sini jika diperlukan) -->
            </div>
        </div>

        <!-- KANAN: Auth -->
        <div class="flex items-center space-x-4">
            @auth
                <span class="text-gray-600 text-sm">Halo, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="flex items-center text-sm text-indigo-900 hover:text-indigo-600 transition">
                    <!-- Icon -->
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H3m6-6l-6 6 6 6"/>
                    </svg>
                    Sign in
                </a>
                <a href="{{ route('register') }}" class="px-5 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-full hover:bg-indigo-700 transition">
                    Register now
                </a>
            @endauth
        </div>
    </div>
</div>
