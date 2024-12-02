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
            <h4 class="card-title text-center mb-4">Modificar Disponibilidad de Asientos</h4>
            <form method="POST" action="{{ route('disponibilidad_asientos.update', $disponibilidad->id) }}">
                @csrf
                @method('put')

                <div class="form-row">
                    <!-- Tipo de asiento -->
                    <div class="form-group col-md-12">
                        <label for="asiento">Tipo de asiento:</label>
                        <input type="text" class="form-control" name="asiento" placeholder="Tipo de asiento" value="{{ $disponibilidad->tipo_asiento }}">
                        <small class="text-danger">{{ $errors->first('asiento') }}</small>
                    </div>

                    <!-- Disponibilidad total -->
                    <div class="form-group col-md-12">
                        <label for="disponibilidad">Disponibilidad Total:</label>
                        <input type="number" class="form-control" id="disponibilidad" name="disponibilidad" placeholder="Asientos totales" value="{{ $disponibilidad->disponibilidad_total }}" readonly>
                        <small class="text-danger">{{ $errors->first('disponibilidad') }}</small>
                    </div>
                    
                    <!-- Uso por adultos -->
                    <div class="form-group col-md-12">
                        <label for="adultos">Uso por adultos:</label>
                        <input type="number" class="form-control uso" name="adultos" id="adultos" placeholder="Asientos para adultos" value="{{ $disponibilidad->uso_adultos }}">
                        <small class="text-danger">{{ $errors->first('adultos') }}</small>
                    </div>
                    
                    <!-- Uso por niños -->
                    <div class="form-group col-md-12">
                        <label for="ninos">Uso por niños:</label>
                        <input type="number" class="form-control uso" name="ninos" id="ninos" placeholder="Asientos para niños" value="{{ $disponibilidad->uso_niños }}">
                        <small class="text-danger">{{ $errors->first('ninos') }}</small>
                    </div>
                    
                    <!-- Uso por ancianos -->
                    <div class="form-group col-md-12">
                        <label for="ancianos">Uso por Ancianos:</label>
                        <input type="number" class="form-control uso" name="ancianos" id="ancianos" placeholder="Asientos para ancianos" value="{{ $disponibilidad->uso_ancianos }}">
                        <small class="text-danger">{{ $errors->first('ancianos') }}</small>
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
                        <a href="{{ route('aerolineas.index') }}" style="color:white">Cancelar</a>
                    </button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
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
