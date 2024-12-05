@extends('layouts.plantillanavbarU')

@section('modulo', '| Políticas de Cancelación')

@section('seccion')
<link href="{{ asset('css/politicasCancelacion.css') }}" rel="stylesheet">

<div class="politicas-container">
    <div class="back-button">
        <a href="{{ route('detallesHoteles', $hotel->id) }}" class="return-link">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <div class="content-box">
        <h1>Políticas de cancelación: {{ $hotel->nombre }}</h1>

        <div class="politicas-text">
            <p>{{ $hotel->politicas_cancelacion }}</p>
        </div>
    </div>
</div>
@endsection
