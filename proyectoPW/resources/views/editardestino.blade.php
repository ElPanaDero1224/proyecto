@extends('layouts.plantillanavbarA')

@section('modulo', 'Editar Destinos')

@section('seccion')

<div class="container mt-4">
    @vite(['resources/js/app.js'])
    <link href="{{ asset('css/editarinfoHotel.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @session('editardestino')
    <script>
    Swal.fire({
    title: "Guardado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
    @endsession

    <!-- Encabezado principal -->
    <div class="text-center mb-4">
        <h1 class="display-4">Editar Destino</h1>
        <p class="text-muted">Llena los campos necesarios para editar un nuevo destino a la lista.</p>
    </div>

    <div class="container mt-3">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('images/detallesHoteles_img1.png')}}" class="card-img" alt="Vista de destino">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <!-- Formulario para agregar un destino -->
                        <form method="POST" action="{{route('destinos.update',$destino->id)}}" enctype="multipart/form-data">
                            @csrf
                            @METHOD('PUT')
                            <div class="form-group">
                                <label for="nombre"><strong>Nombre del Destino:</strong></label>
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre',$destino->nombre) }}">
                                <small>{{ $errors->first('nombre') }}</small>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('destinos.index') }}">
                                    <button type="button" class="btn btn-danger">Cancelar</button>
                                </a>
                                <button type="submit" class="btn btn-secondary">Guardar Destino</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>

@endsection
