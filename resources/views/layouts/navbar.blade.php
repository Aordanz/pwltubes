

    <div class="w-full bg-black px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between items-center  h-24 ">
            <!-- Logo dan Navigasi -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-400 hover:text-indigo-300">Simpus Medical</a>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('about') }}" class="hover:text-indigo-300 transition duration-150 text-white">About</a>
                    <a href="#" class="hover:text-indigo-300 transition duration-150 text-white">Konsultasi</a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Login/Register/User -->
            <div class="hidden md:flex items-center space-x-4">

                @guest
                    <a href="{{ route('login') }}" class="px-4 py-1 border border-indigo-500 text-indigo-400 rounded hover:bg-indigo-500 hover:text-white transition">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Register</a>
                @else
                    <div class="flex items-center space-x-4">
    <span class="text-sm text-gray-300">Halo, {{ Auth::user()->name }}</span>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
            Logout
        </button>
    </form>
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
                <div class="px-2 py-1 text-white">Halo, {{ Auth::user()->name }}</div>
    <form action="{{ route('logout') }}" method="POST" class="px-2 py-1">
        @csrf
        <button type="submit" class="text-left w-full hover:text-red-500">Logout</button>
    </form>
            @endguest
        </div>
    </div>
