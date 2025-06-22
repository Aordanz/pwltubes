<nav class="fixed top-0 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-4xl pt-4 px-4">
    <div class="bg-white/80 backdrop-blur-md rounded-full shadow-lg px-6 py-2 w-full mx-auto flex items-center justify-between">
        
        <div class="flex items-center space-x-5">
            {{-- Logo --}}
            <a href="{{ route('doctor.dashboard') }}" class="text-xl font-extrabold text-indigo-900">
                <span class="text-indigo-500">Simpus</span>
                <span class="text-sky-400">Medical</span>
            </a>

            {{-- Menu Navigasi --}}
            <div class="hidden md:flex items-center space-x-5 border-l border-gray-300 pl-5">
                <a href="{{ route('doctor.dashboard') }}" class="text-sm text-gray-600 hover:text-indigo-500 transition-colors duration-200">Dashboard</a>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            @auth
                <div class="relative group">
                    {{-- Tombol dropdown sekarang hanya berisi nama dan ikon --}}
                    <button class="flex items-center space-x-2 focus:outline-none p-1">
                        <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <div class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-in-out z-50">
                        {{-- Dropdown Menu Content (Hanya Logout) --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-red-50">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>