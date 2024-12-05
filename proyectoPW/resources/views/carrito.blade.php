@extends('layouts.plantillanavbarU')

@section('modulo', '| Carrito')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

@section('seccion')

<link href="{{ asset('/css/carrito.css') }}" rel="stylesheet">

<div class="container mt-4">
    <div class="row justify-content-center">
        @if($carritoVuelos->isEmpty() && $carritoHoteles->isEmpty())
            <div class="col-12 text-center">
                <p class="alert alert-info">No hay registros en el carrito de vuelos ni de hoteles.</p>
            </div>
        @else
            @foreach($carritoVuelos as $reservacionVuelo)
                @php
                    $reservacionHotel = $carritoHoteles->where('id', $reservacionVuelo->id)->first();
                @endphp

                <!-- Tarjeta de vuelo -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $reservacionVuelo->origen }} - {{ $reservacionVuelo->destino }}</h5>
                            <p class="card-text"><strong>Origen:</strong> {{ $reservacionVuelo->origen }}</p>
                            <p class="card-text"><strong>Destino:</strong> {{ $reservacionVuelo->destino }}</p>
                            <p class="card-text"><strong>Fecha de ida:</strong> {{ ($reservacionVuelo->fecha_salida) }}</p>
                            <p class="card-text"><strong>Fecha de vuelta:</strong> {{ ($reservacionVuelo->fecha_llegada) }}</p>
                            <p class="card-text"><strong>Duración:</strong> {{ $reservacionVuelo->duracion }} hrs</p>
                            <p class="card-text"><strong>Precio Total:</strong> ${{ number_format($reservacionVuelo->precio_total_carrito, 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta de hotel -->
                <div class="col-md-4 mb-4">
                    @if($reservacionHotel)
                        <x-hotel-card 
                            hotel="{{ $reservacionHotel->hotel_nombre }}" 
                            checkin="{{ ($reservacionHotel->fecha_check_in)}}"
                            checkout="{{ ($reservacionHotel->fecha_check_out)}}"
                            precio="{{ number_format($reservacionHotel->precio_total, 2) }}"
                        />
                    @else
                        <p class="alert alert-warning">No se encontró información de hotel para este vuelo.</p>
                    @endif
                </div>

                <!-- Tarjeta del Total -->
                <div class="col-md-4 mb-4">
                    <x-total-card total="{{ number_format($reservacionVuelo->precio_total_carrito + ($reservacionHotel ? $reservacionHotel->precio_total : 0), 2) }}" />
                </div>

            @endforeach
        @endif

        <!-- Botón para abrir el modal -->
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testModal">
                Agregar al carrito
            </button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="testModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('carrito.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarritoModalLabel">Agregar al Carrito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="idCliente" class="form-label">ID del Cliente</label>
                        <input type="number" class="form-control" id="idCliente" name="usuario_id" required>
                    </div>
                    
                    <!-- Selecciona el vuelo y muestra el precio -->
                    <!-- Selecciona el vuelo y oculta el precio del texto en el dropdown -->
                <div class="mb-3">
                    <label for="vuelos" class="form-label">Seleccionar Vuelo</label>
                    <select class="form-select" id="vuelos" name="vuelos_en_reservas_vuelos_id" required>
                        @foreach($modalVuelos as $vuelo)
                            <option value="{{ $vuelo->id }}" data-precio="{{ $vuelo->precio }}">
                                {{ $vuelo->numero_vuelo }}
                            </option>
                        @endforeach
                    </select>
                </div>


                    <!-- Campo para mostrar el precio del vuelo seleccionado -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio del vuelo</label>
                        <input type="number" class="form-control" id="precio" name="precio" required readonly>
                    </div>

                    <div class="mb-3">
                        <label for="hoteles" class="form-label">Seleccionar Hotel</label>
                        <select class="form-select" id="hoteles" name="reserva_hotel_id" required>
                            @foreach($modalHoteles as $hotel)
                                <option value="{{ $hotel->id }}">{{ $hotel->hotel_nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script para actualizar el precio del vuelo seleccionado -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectVuelo = document.getElementById('vuelos');
        const inputPrecio = document.getElementById('precio');

        selectVuelo.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const precio = selectedOption.getAttribute('data-precio');
            inputPrecio.value = precio;
        });
    });
</script>

@endsection
