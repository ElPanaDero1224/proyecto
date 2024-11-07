@extends('layouts.plantillaISyR')
@section('modulo', '| Registro')

@section('seccion')
<div class="image-section">
    <h2>TURISTA SIN MAPS</h2>
    <img src="{{ asset('images/piramide.png') }}" alt="Piramide">
</div>

<div class="form-section">
    <h2 class="form-title">Registro</h2>
    <form method="POST" action="{{ route('rutaregistro') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre(s):</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}">
            <small class="text-danger">{{ $errors->first('nombre') }}</small>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos:</label>
            <input type="text" name="apellidos" class="form-control" id="apellidos" value="{{ old('apellidos') }}">
            <small class="text-danger">{{ $errors->first('apellidos') }}</small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="user@example.com">
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Número telefónico:</label>
            <input type="tel" name="telefono" class="form-control" id="telefono" value="{{ old('telefono') }}">
            <small class="text-danger">{{ $errors->first('telefono') }}</small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" class="form-control" id="password">
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña:</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
        </div>
        <button type="submit" class="btn btn-custom">Continuar</button>
    </form>
    <p class="form-text mt-3">¿Ya tienes cuenta? <a href="{{ route('rutainiciarsesion') }}">Inicia sesión</a></p>
</div>

@endsection
