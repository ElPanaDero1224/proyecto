@extends('layouts.plantillaISyR')
@section('modulo', '| Restablecer contraseña')

@section('seccion')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/app.js', 'public\css\restablecerContraseña.css'])
<body>
<div class="image-section">
        <h2>TURISTA SIN MAPS</h2>
        <img src="{{ asset('images/piramide.png') }}" alt="Piramide">
    </div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-4">RESTABLECER CONTRASEÑA</h2>

            @session('exito')
        <script>
            Swal.fire({
                title: "Contraseña actualizada!",
                icon: "success",
                confirmButtonText: "Acpetar"});
        </script>
        @endsession


            <form method="POST" action="formrestablecerContraseña">
                @csrf
                <div class="form-group">
                    <label for="passw" class="sr-only">Nueva Contraseña</label>
                    <input type="text" class="form-control" name="Npassw">
                    <small class="text-danger fst-italic">{{ $errors->first('Npassw') }}</small>
                </div>
                
                <div class="form-group">
                    <label for="passwC" class="sr-only">Confirmar Contraseña</label>
                    <input type="text" class="form-control" name="Cpassw">
                    <small class="text-danger fst-italic">{{ $errors->first('Cpassw') }}</small>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Restablecer</button>
            </form>
        </div>
    </div>
</div>

</body>



@endsection
