@extends('layouts.plantillanavbarU') 
@section('modulo', '| Vuelos')
@section('seccion')

<link href="{{ asset('css/busquedaVuelos.css') }}" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@if(session('status'))
    <script>
        alertify.success("{{ session('status') }}");
    </script>
@endif

<div class="container mt-4">
    <div class="bg-light p-4 rounded shadow-sm">
        <h5 class="text-primary fw-bold">Vuelos</h5>
        <form action="#" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="origen" class="form-label">Origen</label>
                    <input type="text" class="form-control" id="origen" name="origen" placeholder="Ingresa de dónde viajas" value="{{ old('origen') }}">
                    <small class="text-danger">{{ $errors->first('origen') }}</small>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="destino" class="form-label">Destino</label>
                    <input type="text" class="form-control" id="destino" name="destino" placeholder="Ingresa hacia dónde vas" value="{{ old('destino') }}">
                    <small class="text-danger">{{ $errors->first('destino') }}</small>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="fecha-ida" class="form-label">Fecha de Ida</label>
                    <input type="text" class="form-control" id="fecha-ida" name="fecha_ida" placeholder="Ida" value="{{ old('fecha_ida') }}">
                    <small class="text-danger">{{ $errors->first('fecha_ida') }}</small>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="fecha-vuelta" class="form-label">Fecha de Vuelta</label>
                    <input type="text" class="form-control" id="fecha-vuelta" name="fecha_vuelta" placeholder="Vuelta" value="{{ old('fecha_vuelta') }}">
                    <small class="text-danger">{{ $errors->first('fecha_vuelta') }}</small>
                </div>

                <div class="col-md-2 mb-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
            
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#fecha-ida", {
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                flatpickr("#fecha-vuelta", {
                    dateFormat: "Y-m-d",
                    minDate: dateStr
                });
            }
        });
        flatpickr("#fecha-vuelta", {
            dateFormat: "Y-m-d",
            minDate: "today"
        });
    });
</script>

@endsection

