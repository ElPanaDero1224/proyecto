@extends('layouts.plantillaISyR')
@section('modulo', '| Inicio de Sesión')

@section('seccion')
<div class="image-section">
    <h2>TURISTA SIN MAPS</h2>
    <img src="{{ asset('images/piramide.png') }}" alt="Piramide">
</div>

<div class="form-section">
    <h2 class="form-title">Iniciar Sesión</h2>
    <form method="POST" action="{{ route('rutainiciosesion') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="user@example.com">
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" class="form-control" id="password">
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Recordar contraseña</label>
        </div>
        <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
    </form>
    <p class="form-text mt-3">
        ¿Has olvidado tu contraseña? <a href="{{ route('password.request') }}">Haz clic aquí.</a>
    </p>
    <p class="form-text mt-3">
        ¿No tienes una cuenta? <a href="{{ route('rutaregistro') }}">Regístrate</a>
    </p>
</div>
@endsection
