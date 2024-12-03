<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('modulo') Turista Sin Maps</title>
    @vite(['resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/navbarUsuario.css') }}" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Opciones de navegación -->
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <!-- Vuelos: activo para /vuelos y cualquier subruta de /vuelos -->
                <a href="/vuelosDestino" class="nav-link d-flex flex-column align-items-center {{ Request::is('vuelos*') ? 'active' : '' }}">
                    <i class="fas fa-plane"></i>
                    <span>Vuelos</span>
                </a>
            </li>
            <li class="nav-item">
                <!-- Hoteles: activo para /hoteles y cualquier subruta de /hoteles -->
                <a href="/hoteles" class="nav-link d-flex flex-column align-items-center {{ Request::is('hoteles*') ? 'active' : '' }}">
                    <i class="fas fa-hotel"></i>
                    <span>Hoteles</span>
                </a>
            </li>
            <li class="nav-item">
                <!-- Reservas: activo solo para /reservas -->
                <a href="/reservas" class="nav-link d-flex flex-column align-items-center {{ Request::is('reservas') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Reservas</span>
                </a>
            </li>
            <li class="nav-item">
                <!-- Carrito: activo solo para /carrito -->
                <a href="/carrito" class="nav-link d-flex flex-column align-items-center {{ Request::is('carrito') ? 'active' : '' }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Carrito</span>
                </a>
            </li>
        </ul>
        
    </div>
</nav>

<!-- Título central -->
<div class="title-container">
    <h1 class="title-text">TURISTA SIN MAPS</h1>
</div>

<!-- Contenido de la vista -->
<div class="container mt-4">
    @yield('seccion')
</div>

</body>
</html>
