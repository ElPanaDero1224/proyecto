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

<!-- Navbar principal -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Opciones de navegación -->
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a href="/vuelosAmi" class="nav-link d-flex flex-column align-items-center {{ Request::is('vuelosAdmi*') ? 'active' : '' }}">
                    <i class="fas fa-plane"></i>
                    <span>Vuelos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/hotelesAdmi" class="nav-link d-flex flex-column align-items-center {{ Request::is('hotelesAdmi*') ? 'active' : '' }}">
                    <i class="fas fa-hotel"></i>
                    <span>Hoteles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/reservasAdmi" class="nav-link d-flex flex-column align-items-center {{ Request::is('reservasAdmi*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Reservas</span>
                </a>
            </li>
            <li class="nav-item">
                <!-- Modificamos la condición para que también esté activo en las subrutas de notificaciones -->
                <a href="/notificaciones" class="nav-link d-flex flex-column align-items-center {{ Request::is('notificaciones*') ? 'active' : '' }}">
                    <i class="fas fa-bell"></i>
                    <span>Notificaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="/panel" class="nav-link d-flex flex-column align-items-center {{ Request::is('panel') ? 'active' : '' }}">
                    <i class="fas fa-cogs"></i>
                    <span>Panel principal</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Título central -->
<div class="title-container">
    <h1 class="title-text">TURISTA SIN MAPS</h1>
</div>

<!-- Navbar secundaria para notificaciones -->
@if(Request::is('notificaciones*'))
    <div class="container mt-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="/notificaciones/plantillas" class="nav-link {{ Request::is('notificaciones/plantillas') ? 'active' : '' }}">
                        Plantillas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/notificaciones/programados" class="nav-link {{ Request::is('notificaciones/programados') ? 'active' : '' }}">
                        Programados
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endif

<!-- Contenido de la vista -->
<div class="container mt-4">
    @yield('seccion')
</div>

</body>
</html>
