<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')

    <main class="pt-16">
        @yield('content')
    </main>
</body>
</html>
