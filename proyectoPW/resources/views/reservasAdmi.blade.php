@extends('layouts.plantillanavbarA')

@section('modulo', '| Gestionar Reservas')

@section('seccion')
@vite(['resources/js/app.js', 'resources/css/reservasAdmi.css'])



{{-- Tabla de vuelos --}}
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="vuelos-table">
            <thead>
                <tr>
                    <th>Numero de vuelo</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Fecha de salida</th>
                    <th>Fecha de llegada</th>
                    <th>Duración</th>
                </tr>
            </thead>
            <tbody>
               @foreach($vuelos as $vuelo)
                    <tr>
                        <td>{{ $vuelo->numero_vuelo }}</td>
                        <td>{{ $vuelo->origen }}</td>
                        <td>{{ $vuelo->destino }}</td>
                        <td>{{ $vuelo->fecha_salida }}</td>
                        <td>{{ $vuelo->fecha_llegada }}</td>
                        <td>{{ $vuelo->duracion }} hr</td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>

{{-- Contenedor para la gráfica --}}
<div class="row mt-5">
    <div class="col-md-12">
        <canvas id="vuelos-chart"></canvas>
    </div>
</div>

{{-- Botón para generar PDF --}}
<div class="row mt-3">
    <div class="col-md-12">
        <a href="{{ route('reservas.pdf') }}" class="btn btn-primary w-100">Generar PDF</a>
    </div>
</div>

@endsection
