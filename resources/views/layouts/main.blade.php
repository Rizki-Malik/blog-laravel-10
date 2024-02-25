<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
    <title>Rizki Malik - Blog | {{ $title }}</title>
</head>
<body>
    <header class="bg-[#50C4ED]">
        @include('layouts.partials.navbar')
    </header>
    <div class="container mx-auto">
        @yield('container')
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>