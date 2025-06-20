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
        <div class="flex items-center space-x-3">
            <!-- Foto Profil -->
                      @if(Auth::user()->photo)
    <img src="{{ Auth::user()->photo }}" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-indigo-500"/>
@else
    <img src="{{ asset('assets/default-avatar.png') }}" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-indigo-500"/>
@endif

            <!-- Nama User -->
            <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>

            <!-- Icon Garis 3 -->
            <div class="relative group">
                <button class="focus:outline-none">
                    <svg class="w-8 h-8 text-gray-700 hover:text-indigo-600 transition" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-44 bg-white border rounded-lg shadow-lg py-2 opacity-0 group-hover:opacity-100 transition duration-150 ease-in-out z-50">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-indigo-50">Profil Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-red-50">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="flex items-center text-sm text-indigo-900 hover:text-indigo-600 transition">
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
