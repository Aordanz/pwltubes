<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'FitnessPoint')</title>
  @vite('resources/css/app.css')
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.js"></script>
</head>
<body class="font-[Poppins] text-[#020617] bg-white scroll-smooth">

   @include('layouts.navbar') 
<main class="container mx-auto px-4 py-8">
  @yield('content')
</main>

</body>
</html>
