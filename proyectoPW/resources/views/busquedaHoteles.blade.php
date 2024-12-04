@extends('layouts.plantillanavbarU')

@section('modulo', '| Hoteles')
@section('seccion')

<div class="container mt-4">
    <!-- Formulario de búsqueda -->
    <div class="row mt-4">
        <div class="col-md-12">
            <form class="d-flex flex-wrap justify-content-between align-items-center">
                <input type="text" class="form-control me-2 mb-2" placeholder="Destino" name="destino" value="{{ request('destino') }}">
                <input type="date" class="form-control me-2 mb-2" placeholder="Check in" name="check_in" value="{{ request('check_in') }}">
                <input type="date" class="form-control me-2 mb-2" placeholder="Check out" name="check_out" value="{{ request('check_out') }}">
                <input type="number" class="form-control me-2 mb-2" placeholder="Número de habitaciones" name="habitaciones" value="{{ request('habitaciones') }}">
                <input type="number" class="form-control me-2 mb-2" placeholder="Número de huéspedes" name="huespedes" value="{{ request('huespedes') }}">
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
        </div>
    </div>

    <!-- Filtros en una sola línea -->
    <div class="row mt-4">
        <div class="col-md-12">
            <form class="d-flex justify-content-between align-items-center flex-wrap">
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
                                <p class="fw-bold mb-1">Ubicacion: <span>{{ $hotel->ubicacion }}</span></p>
                                <p class="text-muted mt-2">{{ $hotel->descripcion }}</p>
                                <p class="fw-bold mb-1">Desde: <span class="text-success">${{ $hotel->precio_por_noche }}</span></p>
                                <!--<p>Distancia al centro: <span class="text-muted">{{ $hotel->distancia_centro }} km</span></p>-->
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
</style>
@endsection
