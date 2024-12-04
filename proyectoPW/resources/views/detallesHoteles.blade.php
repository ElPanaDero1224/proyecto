@extends('layouts.plantillanavbarU')

@section('modulo', '| Detalles Hotel')

@section('seccion')
    @vite(['resources/js/app.js'])
    <link href="{{ asset('css/detallesHoteles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">




    <div class="container mt-5">
        <div class="hotel-container d-flex align-items-stretch">
            <!-- Sección de imágenes -->
            <div class="image-container col-12 col-md-4 p-0">
                <div id="hotelCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        @foreach ($hotel->fotografias as $index => $fotografia)
                            <div class="carousel-item h-100 {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $fotografia->url_imagen) }}" class="d-block w-100 h-100 object-cover" alt="Hotel Image">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Sección de información del hotel -->
            <div class="hotel-info col-12 col-md-4 p-4">
                <h3>{{ $hotel->nombre }}</h3>
                <p class="rating m-0 text-warning">
                <strong>Categoría:</strong>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $hotel->categoria) 
                                        <span>&#9733;</span> {{-- Estrella llena --}}
                                    @else
                                        <span>&#9734;</span> {{-- Estrella vacía --}}
                                    @endif
                                @endfor
                            </p>
                <p><span class="color:black"><strong>Opinión de usuarios:</strong></span> <span>({{ $hotel->rating_promedio }})</span> {{-- Mostrar el promedio numérico --}}/5</p>
                <p>{{ $hotel->descripcion }}</p>
                <p><strong>Ubicación:</strong> {{ $hotel->ubicacion }}</p>
                <p><strong>Precio por noche:</strong> ${{ $hotel->precio_por_noche }}</p>
                <p><strong>Servicios:</strong> {{ $hotel->servicios }}</p>
                <p><strong>Capacidad:</strong> {{ $hotel->capacidad }}</p>
                <p><strong>Distancia al Centro:</strong> {{ $hotel->distancia_centro." km"}}</p>
                <p><strong>Distancia puntos turisticos:</strong> {{ $hotel->distancia_puntos_turisticos}}</p>
                <!-- Botón Reservar -->
<button class="btn btn-success btn-block mb-2" data-bs-toggle="modal" data-bs-target="#reservationModal">
    Reservar
</button>

<!-- Modal de Reservación -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Reservar Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Cuerpo del Modal -->
            <form id="reservationForm" action="{{ route('reservar.hotel') }}" method="POST">
            @csrf
            <!-- Campo oculto para el ID del hotel -->
            <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

            <div class="mb-3">
                <label for="fecha_check_in" class="form-label">Fecha Check-In</label>
                <input type="date" class="form-control" id="fecha_check_in" name="fecha_check_in" required>
            </div>
            <div class="mb-3">
                <label for="fecha_check_out" class="form-label">Fecha Check-Out</label>
                <input type="date" class="form-control" id="fecha_check_out" name="fecha_check_out" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required min="1">
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>


        
        </div>
    </div>
</div>
<a href="{{ route('politicas.hotel', $hotel->id) }}">
    <button class="btn btn-secondary btn-block">Políticas de cancelación</button>
</a>

            </div>

<!-- Sección de reseñas -->
<div class="reseñas col-12 col-md-4 p-4">
    <h4>Reseñas</h4>

    <!-- Contenedor con límite de altura y scroll -->
    <div class="review-container">
        @if ($hotel->comentarios->isEmpty())
            <p class="text-muted text-center">No hay comentarios aún. Sé el primero en dejar uno.</p>
        @else
            @foreach ($hotel->comentarios as $comentario)
                <div class="review mb-3 border p-3">
                    <p>
                        <strong>
                            @if ($comentario->usuario)
                                {{ $comentario->usuario->nombre }}
                            @else
                                Usuario desconocido
                            @endif
                        </strong>
                        <span class="rating-stars">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $comentario->puntuacion ? 'text-warning' : 'text-secondary' }}"></i>
                            @endfor
                        </span>
                    </p>
                    <p>{{ $comentario->comentario }}</p>

                    <!-- Botones de acciones -->
                    @if ($comentario->usuario_id === 1)
                    <div class="d-flex justify-content-start mt-2">
                    <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" class="d-inline" id="delete-form-{{ $comentario->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" id="delete-btn-{{ $comentario->id }}">
                            Eliminar
                        </button>
                    </form>
                    </div>
                    @endif

                </div>
            @endforeach
        @endif
    </div>

    <!-- Formulario para agregar un comentario -->
    <form action="{{ route('comentarios.store') }}" method="POST" class="mt-4">
        @csrf
        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación</label>
            <select name="puntuacion" id="puntuacion" class="form-control" required>
                <option value="">Seleccione</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea name="comentario" id="comentario" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Añadir comentario</button>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Agregar carrito -->
    <script>
        document.getElementById('Agregaralcarrito').addEventListener('click', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Añadido al carrito!',
                text: 'Tu producto ha sido añadido al carrito exitosamente.',
                showConfirmButton: false,
                timer: 5000
            });
        });
    </script>

     <!-- Eliminar comentario -->
     @if(isset($comentario))
    <script>
        // Selecciona todos los botones de eliminar
document.querySelectorAll('[id^=delete-btn-]').forEach(button => {
    button.addEventListener('click', function() {
        const comentarioId = this.id.split('-')[2]; // Extrae el ID del comentario del botón
        Swal.fire({
            title: '¿Estás seguro de eliminar este comentario?',
            text: 'Esta acción no se puede deshacer.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía el formulario correspondiente
                document.getElementById(`delete-form-${comentarioId}`).submit();
            }
        });
    });
});

    </script>
@endif

<!--Mensajes de borrar mensaje -->
@if(session('eliminarcomentario'))
    <script>
        Swal.fire({
            title: "Eliminado",
            text: "{{ session('eliminarcomentario') }}",
            icon: "success"
        });
    </script>
@endif
<!-- Mensaje de comentario agregado correctamente  -->
@if(session('comentarioagregado'))
    <script>
        Swal.fire({
            title: "¡Comentario agregado!",
            text: "{{ session('comentarioagregado') }}",
            icon: "success"
        });
    </script>
@endif

@endsection