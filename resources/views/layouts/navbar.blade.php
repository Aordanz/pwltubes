<nav class="bg-gray-900 text-white shadow-md">
    <nav class="fixed top-0 left-0 w-full z-50 bg-[#020617]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
           
<!-- KIRI: Logo & Menu -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-400 hover:text-indigo-300">Simpus Medical</a>
                <a href="{{ route('about') }}" class="hover:text-indigo-300">About</a>

                <!-- Dropdown Konsultasi Online -->
                <div class="relative group">
                    <button class="hover:text-blue-300 focus:outline-none">Konsultasi</button>
                </div>
            </div>

            <!-- KANAN: Login/Register atau User -->
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded border border-indigo-500 text-indigo-400 hover:bg-indigo-500 hover:text-white transition">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 rounded bg-indigo-600 hover:bg-indigo-700 transition">Register</a>
                @else
                    <span class="text-sm text-gray-300">Halo, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 transition">Logout</button>
                    </form>
                @endguest
            </div>


        </div>
    </div>
</nav>