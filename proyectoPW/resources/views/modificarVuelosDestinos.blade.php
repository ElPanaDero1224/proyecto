@extends('layouts.plantillanavbarA') 
@section('modulo', '| Nuevo vuelo')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('seccion')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Modificar Vuelo</h4>
            <form method="POST" action="{{ route('mdfcvls') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="numeroVuelo">Número de vuelo:</label>
                        <input type="text" class="form-control" name="numeroVuelo" placeholder="Número de vuelo" value="{{ old('numeroVuelo', 'DEF123') }}">
                        <small class="text-danger">{{ $errors->first('numeroVuelo') }}</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="aerolinea">Aerolínea:</label>
                        <select name="aerolinea" class="form-control">
                            <option {{ old('aerolinea') == 'Aeromexico' ? 'selected' : '' }}>Aeromexico</option>
                            <option {{ old('aerolinea') == 'United Airlines' ? 'selected' : '' }}>United Airlines</option>
                            <option {{ old('aerolinea') == 'Delta' ? 'selected' : '' }}>Delta</option>
                            <option {{ old('aerolinea') == 'Volaris' ? 'selected' : '' }}>Volaris</option>
                        </select>
                        <small class="text-danger">{{ $errors->first('aerolinea') }}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="horario">Horario:</label>
                        <input type="datetime-local" class="form-control" name="horario" value="{{ old('horario', now()->format('Y-m-d\TH:i')) }}">
                        <small class="text-danger">{{ $errors->first('horario') }}</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="precio">Precio por pasajero:</label>
                        <input type="number" class="form-control" name="precio" placeholder="Precio" value="{{ old('precio', 1000) }}">
                        <small class="text-danger">{{ $errors->first('precio') }}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="escalas">Escalas:</label>
                        <select name="escalas" class="form-control">
                            <option {{ old('escalas') == 'Directo' ? 'selected' : '' }}>Directo</option>
                            <option {{ old('escalas') == '1 Escala' ? 'selected' : '' }}>1 Escala</option>
                            <option {{ old('escalas') == '2 Escalas' ? 'selected' : '' }}>2 Escalas</option>
                            <option {{ old('escalas') == '3 Escalas' ? 'selected' : '' }}>3 Escalas</option>
                        </select>
                        <small class="text-danger">{{ $errors->first('escalas') }}</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="asientos">Número de asientos del vuelo:</label>
                        <input type="number" class="form-control" name="asientos" placeholder="Asientos" value="{{ old('asientos', 150) }}">
                        <small class="text-danger">{{ $errors->first('asientos') }}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="duracion">Duración:</label>
                        <select name="duracion" class="form-control">
                            <option {{ old('duracion') == '1 hora' ? 'selected' : '' }}>1 hora</option>
                            <option {{ old('duracion') == '2 horas' ? 'selected' : '' }}>2 horas</option>
                            <option {{ old('duracion') == '3 horas' ? 'selected' : '' }}>3 horas</option>
                            <option {{ old('duracion') == '4 horas' ? 'selected' : '' }}>4 horas</option>
                        </select>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="button" style="background: rgb(253, 103, 103); color:white" class="btn btn-secondary">
                        <a href="/vuelosAdmiAdministrar" style="color:white">Cancelar</a>
                    </button>
                    <button type="submit" style="background: rgb(147, 194, 235)" class="btn">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(session('exito'))
    <script>
        Swal.fire({
            title: "Exito!",
            text: "{{ session('exito') }}",
            icon: "success"
        });
    </script>
@endif

@if($errors->any())
    <script>
        let errorMessages = '<ul>';
        @foreach ($errors->all() as $error)
            errorMessages += '<li>{{ $error }}</li>';
        @endforeach
        errorMessages += '</ul>';

        Swal.fire({
            title: "Error!",
            html: errorMessages,
            icon: "error"
        });
    </script>
@endif

@endsection
