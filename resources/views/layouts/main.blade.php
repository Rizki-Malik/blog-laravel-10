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

    <div class="container mx-auto min-h-screen">
        @yield('container')
    </div>
    <footer class="bg-[#50C4ED] sm:flex sm:items-center sm:justify-between p-4 sm:p-6 xl:p-8 dark:bg-gray-800 bottom-0">
        @include('layouts.partials.footer')
    </footer>
    
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>