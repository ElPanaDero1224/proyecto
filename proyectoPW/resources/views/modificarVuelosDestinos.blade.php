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
            <h4 class="card-title text-center mb-4">Modificar Vuelo</h4>
            <form method="POST" action="{{ route('vuelos.update', $vuelos->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <!-- Número de vuelo -->
                    <div class="form-group col-md-12">
                        <label for="numeroVuelo">Número de vuelo:</label>
                        <input type="text" class="form-control" name="numeroVuelo" placeholder="Número de vuelo" value="{{ $vuelos->numero_vuelo }}">
                        <small class="text-danger">{{ $errors->first('numeroVuelo') }}</small>
                    </div>

                    <!-- Origen -->
                    <div class="form-group col-md-12">
                        <label for="origen">Origen:</label>
                        <input type="text" class="form-control" name="origen" placeholder="Origen del vuelo" value="{{ $vuelos->origen }}">
                        <small class="text-danger">{{ $errors->first('origen') }}</small>
                    </div>

                    <!-- Destino -->
                    <div class="form-group col-md-12">
                        <label for="destino">Destino:</label>
                        <input type="text" class="form-control" name="destino" placeholder="Destino del vuelo" value="{{ $vuelos->destino }}">
                        <small class="text-danger">{{ $errors->first('destino') }}</small>
                    </div>

                    <!-- Fecha de salida -->
                    <div class="form-group col-md-12">
                        <label for="fechaSalida">Fecha de salida:</label>
                        <input type="text" id="fecha-ida" class="form-control" name="fechaSalida" placeholder="Fecha y hora de salida" value="{{ $vuelos->fecha_salida }}">
                        <small class="text-danger">{{ $errors->first('fechaSalida') }}</small>
                    </div>

                    <!-- Fecha de llegada -->
                    <div class="form-group col-md-12">
                        <label for="fechaLlegada">Fecha de llegada:</label>
                        <input type="text" id="fecha-vuelta" class="form-control" name="fechaLlegada" placeholder="Fecha y hora de llegada" value="{{ $vuelos->fecha_llegada }}">
                        <small class="text-danger">{{ $errors->first('fechaLlegada') }}</small>
                    </div>

                    <!-- Duración (solo lectura) -->
                    <div class="form-group col-md-12">
                        <label for="duracion">Duración del vuelo (horas):</label>
                        <input type="text" id="duracion" class="form-control" name="duracion" value="{{$vuelos->duracion}}" placeholder="Duración estimada (ingresa las fechas para hacer el cálculo)" readonly>
                    </div>

                    <!-- Aerolínea -->
                    <div class="form-group col-md-12">
                        <label for="aerolinea">Aerolínea:</label>
                        <select name="aerolinea" class="form-control">
                            
                            @foreach($ar as $ar)
                            <option value="{{$ar->id}}" {{old('aerolinea')}}>{{$ar->nombre}}</option>
                            @endforeach

                        </select>
                        <small class="text-danger">{{ $errors->first('aerolinea') }}</small>
                    </div>

                    <!-- Precio por pasajero -->
                    <div class="form-group col-md-12">
                        <label for="precio">Precio por pasajero:</label>
                        <select name="precio" class="form-control">

                            @foreach($pre as $pre)
                            <option value="{{$pre->id}}" {{old('precio')}}>{{$pre->clase }} - ${{$pre->precio}}</option>
                            @endforeach

                        </select>
                        <small class="text-danger">{{ $errors->first('precio') }}</small>
                    </div>

                    <!-- Escalas -->
                    <div class="form-group col-md-12">
                        <label for="escalas">Escalas:</label>
                        <input type="text" class="form-control" name="escalas" placeholder="Escalas del vuelo (Dejar en blanco si no cuenta con ellas)" value="{{ $vuelos->escalas }}">
                        <small class="text-danger">{{ $errors->first('escalas') }}</small>
                    </div>
                </div>

                <!-- Botones -->
                <div class="form-group text-center">
                    <button type="button" class="btn btn-secondary" style="background: rgb(253, 103, 103); color:white">
                        <a href="{{route('vuelos.index')}}" style="color:white">Cancelar</a>
                    </button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Inicializar flatpickr
    flatpickr("#fecha-ida", {
        enableTime: true,
        dateFormat: "Y-m-d H:i:S",
        time_24hr: true,
        onChange: calcularDuracion
    });

    flatpickr("#fecha-vuelta", {
        enableTime: true,
        dateFormat: "Y-m-d H:i:S",
        time_24hr: true,
        onChange: calcularDuracion
    });

    // Función para calcular la duración en horas
    function calcularDuracion() {
        const fechaSalida = document.getElementById('fecha-ida').value;
        const fechaLlegada = document.getElementById('fecha-vuelta').value;

        if (fechaSalida && fechaLlegada) {
            const fechaSalidaObj = new Date(fechaSalida);
            const fechaLlegadaObj = new Date(fechaLlegada);

            if (fechaLlegadaObj < fechaSalidaObj) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La fecha de llegada no puede ser anterior o mayor a la fecha de salida.',
                    confirmButtonColor: '#dc3545'
                });
                document.getElementById('fecha-ida').value = '';
                document.getElementById('duracion').value = ''; // Limpiar duración
            } else {
                const diff = (fechaLlegadaObj - fechaSalidaObj) / (1000 * 60 * 60);
                document.getElementById('duracion').value = diff.toFixed(2); // Mostrar duración en horas
            }
        }
    }
</script>

@endsection
