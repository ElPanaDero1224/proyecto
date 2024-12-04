@extends('layouts.plantillanavbarU')

@section('modulo', '| Hoteles')
@section('seccion')

<div class="container mt-4">
<!-- Formulario de búsqueda -->
<div class="container mt-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <form class="search-form d-flex flex-wrap justify-content-between align-items-center p-3 rounded">
                <!-- Filtro de destino -->
                <select class="form-control me-2 mb-2" name="destino" value="{{ request('destino') }}">
                    <option value="">Seleccione un destino</option>
                    @foreach($destinos as $destino)
                        <option value="{{ $destino->id }}" {{ request('destino') == $destino->id ? 'selected' : '' }}>
                            {{ $destino->nombre }}
                        </option>
                    @endforeach
                </select>
                
                <!-- Otros campos de búsqueda -->
                 <!--
                <input type="date" class="form-control me-2 mb-2" placeholder="Check in" name="check_in" value="{{ request('check_in') }}">
                <input type="date" class="form-control me-2 mb-2" placeholder="Check out" name="check_out" value="{{ request('check_out') }}">
                -->
                
                <!-- Filtro por número de habitaciones -->
                <input type="number" class="form-control me-2 mb-2" placeholder="Número de habitaciones" name="habitaciones" value="{{ request('habitaciones') }}">
                <!--
                <input type="number" class="form-control me-2 mb-2" placeholder="Número de huéspedes" name="huespedes" value="{{ request('huespedes') }}">-->
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
        </div>
    </div>


    <!-- Filtros en una sola línea -->
    <div class="row mt-4">
        <div class="col-md-12">
            <form class="filter-form d-flex justify-content-between align-items-center flex-wrap p-3 rounded">
                <select class="form-control me-2 mb-2" name="categoria">
                    <option value="">Categoría</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ request('categoria') == $i ? 'selected' : '' }}>{{ $i }} Estrellas</option>
                    @endfor
                </select>
                <input type="number" class="form-control me-2 mb-2" placeholder="Máximo precio" name="precio_max" value="{{ request('precio_max') }}">
                <input type="number" class="form-control me-2 mb-2" placeholder="Distancia al centro (km)" name="distancia_max" value="{{ request('distancia_max') }}">
                <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
            </form>
        </div>
    </div>

    <!-- Resultados -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h4 class="fw-bold">Resultados de búsqueda:</h4>
            @if($consulta->isEmpty())
                <p class="text-center text-muted">No se encontraron hoteles que coincidan con los filtros aplicados.</p>
            @else
                @foreach($consulta as $hotel)
                    <div class="hotel-card p-3 d-flex justify-content-between align-items-center border rounded mt-3 bg-white shadow-sm">
                        <div class="d-flex">
                            <img src="{{ asset('storage/' . $hotel->fotografias->first()->url_imagen) }}" alt="{{ $hotel->nombre }}" class="me-3 rounded" width="150">
                            <div>
                                <h5 class="text-primary fw-bold">{{ $hotel->nombre }}</h5>
                                <p class="rating m-0 text-warning">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $hotel->categoria) 
                                            <span>&#9733;</span> {{-- Estrella llena --}}
                                        @else
                                            <span>&#9734;</span> {{-- Estrella vacía --}}
                                        @endif
                                    @endfor
                                </p>
                                <p class="fw-bold mb-1">Ubicación: <span>{{ $hotel->ubicacion }}</span></p>
                                <p class="text-muted mt-2">{{ $hotel->descripcion }}</p>
                                <p class="fw-bold mb-1">Desde: <span class="text-success">${{ $hotel->precio_por_noche }}</span></p>
                                <p class="fw-bold mb-1">Número de Habitaciones: <span>{{ $hotel->capacidad }}</span></p>
                                <p class="fw-bold mb-1">Destino: <span>{{ $hotel->destino ? $hotel->destino->nombre : 'Sin destino asignado' }}</span></p>

                                <p>Estado: <span class="badge bg-success">Disponible</span></p>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('detallesHoteles', ['id' => $hotel->id]) }}" class="btn btn-success">Ver más</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>


<!-- Estilos adicionales -->
<style>
    .hotel-card img {
        object-fit: cover;
        height: 100px;
    }

    .rating span {
        font-size: 1.2rem;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    form select,
    form input {
        max-width: 200px; /* Ajustar tamaño */
    }

    /* Fondo diferenciado para formularios */
    .search-form {
        background-color: #f8f9fa; /* Color claro */
    }

    .filter-form {
        background-color: #62b5a7; /* Color ligeramente más oscuro */
    }
</style>
@endsection
