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
            <h4 class="card-title text-center mb-4">Agregar Disponibilidad de Asientos</h4>
            <form method="POST" action="{{ route('disponibilidad_asientos.store') }}">
                @csrf

                <div class="form-row">
                    <!-- Tipo de asiento -->
                    <div class="form-group col-md-12">
                        <label for="asiento">Tipo de asiento:</label>
                        <input type="text" class="form-control" name="asiento" placeholder="Tipo de asiento" value="{{ old('asiento') }}">
                        <small class="text-danger">{{ $errors->first('asiento') }}</small>
                    </div>

                    <!-- Disponibilidad total -->
                    <div class="form-group col-md-12">
                        <label for="disponibilidad">Disponibilidad Total:</label>
                        <input type="number" class="form-control" id="disponibilidad" name="disponibilidad" placeholder="Asientos totales" value="{{ old('disponibilidad') }}">
                        <small class="text-danger">{{ $errors->first('disponibilidad') }}</small>
                    </div>



                    <!-- Vuelo -->
                    <div class="form-group col-md-12">
                        <label for="vuelo">Vuelo:</label>
                        <select name="vuelo" class="form-control">
                            @foreach($vuelos as $v)
                                <option value="{{ $v->id }}" {{ old('vuelo') == $v->id ? 'selected' : '' }}>
                                    {{ $v->numero_vuelo }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('vuelo') }}</small>
                    </div>
                </div>

                <!-- Botones -->
                <div class="form-group text-center">
                    <button type="button" class="btn btn-secondary" style="background: rgb(253, 103, 103); color:white">
                        <a href="{{ route('disponibilidad_asientos.index') }}" style="color:white">Cancelar</a>
                    </button>
                    <button type="submit" class="btn btn-success">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const usoInputs = document.querySelectorAll('.uso');
        const disponibilidadInput = document.getElementById('disponibilidad');

        const calcularDisponibilidad = () => {
            let total = 0;
            usoInputs.forEach(input => {
                const value = parseInt(input.value) || 0;
                total += value;
            });
            disponibilidadInput.value = total;
        };

        usoInputs.forEach(input => {
            input.addEventListener('input', calcularDisponibilidad);
        });
    });

</script>

@endsection
