@extends('layouts.plantillanavbarA')

@section('modulo', '| Nuevo vuelo')

<!-- Estilos y scripts necesarios -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@section('seccion')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Modificar Aerolinea</h4>
            <form method="POST" action="{{route('aerolineas.update', $ar->id) }}" >
                @csrf
                @method('PUT')

                <div class="form-row">
                    <!-- Número de vuelo -->
                    <div class="form-group col-md-12">
                        <label for="nombreAerolinea">Nombre de la aerolinea:</label>
                        <input type="text" class="form-control" name="aerolinea" placeholder="Aerolinea" value="{{ $ar->nombre }}">
                        <small class="text-danger">{{ $errors->first('nombreAerolinea') }}</small>
                    </div>

                    
                <!-- Botones -->
                <div class="form-group text-center">
                    <button type="button" class="btn btn-secondary" style="background: rgb(253, 103, 103); color:white">
                        <a href="{{route('aerolineas.index')}}" style="color:white">Cancelar</a>
                    </button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
