@extends('layouts.plantillanavbarU')
@section('modulo', '| Hoteles')
@section('seccion')

<div class="container mt-4">
    <h2 class="text-center">TURISTA SIN MAPS</h2>

    <div class="row mt-4">
        <div class="col-md-12">
            <form class="d-flex justify-content-between align-items-center">
                <input type="text" class="form-control me-2" placeholder="Destino">
                <input type="date" class="form-control me-2" placeholder="Check in">
                <input type="date" class="form-control me-2" placeholder="Check out">
                <input type="number" class="form-control me-2" placeholder="Número de habitaciones">
                <input type="number" class="form-control me-2" placeholder="Número de huéspedes">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h4>Resultados de búsqueda:</h4>
            <div class="hotel-card p-3 d-flex justify-content-between align-items-center border rounded mt-3">
                <div>
                    <h5>Hotel Rivera: Suite Acapulco</h5>
                    <p>★★★★☆</p>
                    <p>Desde: $5,000</p>
                    <p>Estado: <span class="text-success">Disponible</span></p>
                </div>
                <a href="{{ url('/hotelesDetalles') }}" class="btn btn-success">Ver más</a>
            </div>
        </div>
    </div>
</div>

@endsection
