<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
    <title>Rizki Malik - Blog | {{ $title }}</title>
</head>
<body>
    <header class="bg-cyan-500">
        @include('layouts.partials.navbar')
    </header>

    <div class="container mx-auto">
        @yield('container')
    </div>

    <script src="js/script.js"></script>
</body>
</html>