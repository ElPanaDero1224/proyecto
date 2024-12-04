@extends('layouts.plantillanavbarU')

@section('modulo', '| Resumen de Vuelo ')

<!-- Estilos y scripts necesarios -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@section('seccion')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Resumen del Vuelo</h4>

            <!-- Mostrar los datos de vuelo -->
            <div class="mb-3">
                <p><strong>Aerolínea:</strong> {{ $consulta->aerolinea }}</p>
                <p><strong>Número de Vuelo:</strong> {{ $consulta->numero_vuelo }}</p>
                <p><strong>Fecha de Salida:</strong> {{ \Carbon\Carbon::parse($consulta->fecha_salida)->format('d-m-Y H:i') }}</p>
                <p><strong>Fecha de Llegada:</strong> {{ \Carbon\Carbon::parse($consulta->fecha_llegada)->format('d-m-Y H:i') }}</p>
                <p><strong>Duración del Vuelo:</strong> {{ $consulta->duracion }} horas</p>
                <p><strong>Escalas:</strong> {{ $consulta->escalas }}</p>
                <p><strong>Precio:</strong> ${{ number_format($consulta->precio, 2) }}</p>
                <p><strong>Referencia de Disponibilidad:</strong> {{ $consulta->disponibilidadReferencia }}</p>
            </div>

            <!-- Formulario -->
            <form method="POST" action="{{ route('vuelos_en_reservas_vuelos.store', $consulta->disponibilidad_id) }}">
                @csrf
                <!-- Campo oculto para el ID del vuelo -->
                <input type="hidden" name="vuelo_id" value="{{ $consulta->vueloid }}">
            
                <!-- Cantidad de boletos -->
                <div class="form-group">
                    <label for="boletos">Cantidad de boletos:</label>
                    <input type="text" class="form-control" name="boletos" placeholder="Boletos" value="{{ old('boletos') }}">
                    <small class="text-danger">{{ $errors->first('boletos') }}</small>
                </div>
            
                <!-- Botones -->
                <div class="form-group text-center mt-4">
                    <a href="/vuelosDestino" class="btn btn-secondary" style="background: rgb(253, 103, 103); color:white">Cancelar</a>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection
