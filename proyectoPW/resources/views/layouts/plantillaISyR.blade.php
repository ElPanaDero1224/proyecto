<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turista Sin Maps @yield('modulo')</title>
    @vite(['resources/js/app.js'])
    <link href="{{ asset('/css/iniciosesionR.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('seccion')
    </div>
</body>
</html>