<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <title>Kode Qwerty - Blog | {{ $title }}</title>
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script> --}}
</head>
    <body class="dark">
        <div class="antialiased bg-gray-50 dark:bg-gray-900">

            @include('dashboard.partials.navbar')
        
            @include('dashboard.partials.sidebar')
        
            @yield('container')

        </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>