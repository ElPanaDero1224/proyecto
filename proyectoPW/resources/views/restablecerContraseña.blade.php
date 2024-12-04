@extends('layouts.plantillaISyR')
@section('modulo', '| Restablecer contraseña')

@section('seccion')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="image-section text-center">
        <h2>TURISTA SIN MAPS</h2>
        <img src="{{ asset('images/piramide.png') }}" alt="Pirámide" class="img-fluid">
    </div>
    @session('exito') 
        <script>
            Swal.fire({
                title: "¡Contraseña actualizada!",
                icon: "success",
                confirmButtonText: "Aceptar"
            });
        </script>
    @endsession
<div class="form-section mt-4">
        <h2 class="form-title text-center">RESTABLECER CONTRASEÑA</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
        
            <div class="form-group mb-3">
                <label for="Npassw" class="form-label">Nueva Contraseña</label>
                <input type="password" id="password" name="password" class="form-control">
                <small class="text-danger fst-italic">{{ $errors->first('password') }}</small>
            </div>
        
            
            <div class="form-group mb-3">
                <label for="Cpassw" class="form-label">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                <small class="text-danger fst-italic">{{ $errors->first('password_confirmation') }}</small>
            </div>
        
            <button type="submit" class="btn btn-primary btn-block mt-4 w-100">Restablecer</button>
        </form>        
    </div>
@endsection