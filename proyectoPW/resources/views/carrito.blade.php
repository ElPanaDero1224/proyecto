@extends('layouts.plantillanavbarU') 
@section('modulo', '| Carrito')
@section('seccion')

<link href="{{ asset('/css/carrito.css') }}" rel="stylesheet">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <x-flight-card 
                ruta="Querétaro - Ixtapa Zihuatanejo"
                origen="Querétaro" 
                destino="Ixtapa Zihuatanejo"
                fechaIda="28 sep 2024"
                fechaVuelta="30 sep 2024"
                precio="2333"
                duracion="7h 21m" 
            />
        </div>
        
        <div class="col-md-4 mb-4">
            <x-hotel-card 
                hotel="Hotel Fontan Ixtapa"
                checkin="28 sep 2024 - 03:00"
                checkout="30 sep 2024 - 12:00"
                precio="5000"
            />
        </div>
        
        <div class="col-md-4 mb-4">
            <x-total-card total="10546.00" />
        </div>
    </div>
</div>

@endsection
