@extends('layouts.plantillanavbarU')

@section('modulo', '| Detalles Hotel')

@section('seccion')
    @vite(['resources/js/app.js'])
    <link href="{{ asset('css/detallesHoteles.css') }}" rel="stylesheet">

    <div class="container mt-5">
        <div class="hotel-container d-flex align-items-stretch flex-column flex-md-row">
            <div class="image-container col-12 col-md-5 p-0">
                <div id="hotelCarousel" class="carousel slide border-0 rounded-start h-100" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img src="{{ asset('images/detallesHoteles_img1.png') }}" class="d-block w-100 rounded-start" alt="Hotel Image">
                        </div>
                        <div class="carousel-item active">
                            <img src="{{ asset('images/detallesHoteles_img2.jpg') }}" class="d-block w-100 rounded-start" alt="Hotel Image">
                        </div>
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
            <div class="col-12 col-md-4 p-4 hotel-info">
                <h3>Hotel Rivera: Suite Acapulco.</h3>
                <p>★★★★☆</p>
                <p>Un cuarto con vista al mar es una habitación en un hotel que ofrece una vista panorámica directa del océano desde sus ventanas o balcón.</p>
                <p><strong>Ubicación:</strong> 76113 Domino's Bernardo Quintana</p>
                <p><strong>Desde:</strong> $5,000</p>
                <p><strong>Estado:</strong> <span class="text-success">Disponible</span></p>
                <p><strong>Puntuación de los usuarios:</strong> 9.5/10</p>
                <button class="btn btn-success btn-block mb-2" id='Agregaralcarrito'>Añadir al carrito</button>
                <a href="{{ route('rutaPloticas') }}">
                    <button class="btn btn-secondary btn-block">Políticas de cancelación</button>
                </a>
            </div>
            <div class="col-12 col-md-3 p-4 reseñas">
                <h4>Reseñas</h4>
                <div class="review mb-3">
                    <p><strong>PersonaX:</strong>
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </p>
                    <p>Este hotel está muy chido, volvería a ir, pero no tengo dinero.</p>
                </div>
                <div class="review mb-3">
                    <p><strong>ChicaX:</strong>
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </p>
                    <p>A veces se me olvidan las cosas, pero el hotel está chido.</p>
                </div>
                <div class="review mb-3">
                    <p><strong>ChicaX:</strong>
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </p>
                    <p>A veces se me olvidan las cosas, pero el hotel esta chido.</p>
                </div>
                <div class="review mb-3">
                    <p><strong>ChicaX:</strong>
                        <span class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </p>
                    <p>Hola.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@endsection
