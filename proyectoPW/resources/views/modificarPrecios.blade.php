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
            <h4 class="card-title text-center mb-4">Modificar Clase</h4>
            <form method="POST" action="{{route('precios.update', $precio->id) }}">
                @csrf
                @method('put')

                <div class="form-row">
                    <!-- Número de vuelo -->
                    <div class="form-group col-md-12">
                        <label for="nombreClase">Nombre de la clase:</label>
                        <input type="text" class="form-control" name="nombreClase" placeholder="nombre de la clase" value="{{ $precio->clase }}">
                        <small class="text-danger">{{ $errors->first('nombreClase') }}</small>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="nombreClase">Precio de la clase:</label>
                        <input type="text" class="form-control" name="precioClase" placeholder="Precio de la clase" value="{{ $precio->precio }}">
                        <small class="text-danger">{{ $errors->first('nombreClase') }}</small>
                    </div>

                    
                <!-- Botones -->
                <div class="form-group text-center">
                    <button type="button" class="btn btn-secondary" style="background: rgb(253, 103, 103); color:white">
                        <a href="{{route('precios.index')}}" style="color:white">Cancelar</a>
                    </button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
