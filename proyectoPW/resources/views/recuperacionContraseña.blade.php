@extends('layouts.plantillaISyR')
@section('modulo', '| Recuperar contraseña')

@section('seccion')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="image-section">
        <h2>TURISTA SIN MAPS</h2>
        <img src="{{ asset('images/piramide.png') }}" alt="Piramide">
    </div>
    
    <div class="form-section">
        <h2 class="form-title">Recuperar Contraseña</h2>
        <form method="POST" action="{{route('password.request')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="text" class="form-control" name="email" placeholder="example@domain.com" value="{{old('email')}}">
                <small class="text-danger">{{$errors->first('email')}}</small>
            </div>
            <button type="button" class="btn btn-secondary me-2">
                <a href="{{route('rutainiciarsesion')}}" style="color: white">Iniciar Sesion</a>
            </button>
            <button type="submit" class="btn btn-primary">Enviar correo</button>
        </form>
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
        let errorMessages = '';
        @foreach ($errors->all() as $error)
            errorMessages += '{{ $error }}\n';
        @endforeach

        Swal.fire({
            title: "Error!",
            text: errorMessages,
            icon: "error"
        });
    </script>
@endif


@endsection