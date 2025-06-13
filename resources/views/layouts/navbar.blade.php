
<nav class="bg-gray-900 text-white shadow-md">
    <nav class="fixed top-0 left-0 w-full z-50 bg-[#020617]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">


    <div class="flex justify-between items-center px-4 sm:px-6 lg:px-8 bg-gray-900 h-24 ">
        <div class="flex justify-between w-full  h-16 items-center">
           
        <!-- KIRI: Logo & Menu -->
            <div class="flex items-center text-white space-x-6">
                <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-400 hover:text-indigo-300">Simpus Medical</a>
                <a href="{{ route('about') }}" class="hover:text-indigo-300">About</a>

                <!-- Dropdown Konsultasi Online -->
                <div class="relative group">
                    <button class="hover:text-blue-300 focus:outline-none">Konsultasi</button>
                </div>
            </div>

            <!-- KANAN: Login/Register atau User -->
            <div class="flex items-center space-x-4">

<nav class="fixed top-0 left-0 right-0 z-50 bg-[#020617] text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo dan Navigasi -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-400 hover:text-indigo-300">Simpus Medical</a>
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('about') }}" class="hover:text-indigo-300 transition duration-150">About</a>
                    <a href="#" class="hover:text-indigo-300 transition duration-150">Konsultasi</a>
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
                    <div class="relative group">
                        <button class="text-sm text-gray-300 hover:text-white focus:outline-none">
                            Halo, {{ Auth::user()->name }}
                        </button>
                        <div class="absolute right-0 mt-2 w-32 bg-white text-black rounded shadow-lg hidden group-hover:block">
                            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 hover:bg-gray-100">
                                @csrf
                                <button type="submit" class="w-full text-left">Logout akun</button>
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


    <!-- Script Toggle -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</nav>
