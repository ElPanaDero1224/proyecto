@extends('layouts.plantillaISyR')
@section('modulo', '| Verificación')

@section('seccion')

<link href="{{ asset('css/verificacion.css') }}" rel="stylesheet">

<div class="verification-container">
    <div class="left-section">
        <div class="verification-form">
            <h3>Verificación en dos pasos</h3>
            <form action="{{ route('verificar2fa') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="codigo">Código de verificación</label>
                    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingresa tu código" required>
                </div>
                <br>
                <button type="submit" class="btn btn-submit">Verificar</button>
            </form>
        </div>
    </div>
    <div class="right-section">
        <img src="{{ asset('images/verification.png') }}" alt="Verificación" class="side-image">
    </div>
</div>

@endsection



