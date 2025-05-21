<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="bg-gray-800 p-8 rounded-xl shadow-lg w-full max-w-md text-white">
        <h2 class="text-3xl font-bold mb-6 text-center">Buat Akun Baru</h2>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block mb-1 font-semibold">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <div>
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <div>
                <label for="password" class="block mb-1 font-semibold">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <div>
                <label for="password_confirmation" class="block mb-1 font-semibold">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2" />
            </div>

            <!-- Tambahkan dropdown Role -->
            <div>
                <label for="role" class="block mb-1 font-semibold">Role</label>
                <select name="role" id="role" required
                    class="w-full rounded border-gray-300 text-gray-900 p-2">
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Field Usia, tampil jika role user -->
            <div id="usia-field" style="display: {{ old('role') == 'admin' ? 'none' : 'block' }};">
                <label for="usia" class="block mb-1 font-semibold">Rentang Usia</label>
                <input type="number" name="usia" id="usia" placeholder="Masukkan usia"
                    value="{{ old('usia') }}"
                    class="w-full rounded border-gray-300 p-2 text-gray-900" />
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold p-3 rounded">Register</button>
        </form>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function () {
            var usiaField = document.getElementById('usia-field');
            if (this.value === 'admin') {
                usiaField.style.display = 'none';
            } else {
                usiaField.style.display = 'block';
            }
        });
    </script>
</body>
</html>