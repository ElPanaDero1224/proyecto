@extends('layouts.plantillanavbarA')

@section('modulo', '| Editar información')

@section('seccion')

<div class="container mt-4">
    @vite(['resources/js/app.js'])
    <link href="{{ asset('css/editarinfoHotel.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @session('editarhotel')
    <script>
    Swal.fire({
    title: "Guardado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
    @endsession

    <div class="container mt-3">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('images/detallesHoteles_img1.png')}}" class="card-img" alt="Vista de la playa">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <form method="POST" action='/editarhotel'>
                            @csrf
                            <div class="form-group">
                                <label for="titulo"><strong>Título:</strong></label>
                                <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}">
                                <small>{{$errors->first("titulo")}}</small>
                            </div>
                            <div class="form-group">
                                <label for="descripcion"><strong>Descripción:</strong></label>
                                <textarea class="form-control" name="descripcion" rows="3" value="{{old('descripcion')}}"></textarea>
                                <small>{{$errors->first("descripcion")}}</small>
            
                            </div>
                            <div class="form-group">
                                <label for="ubicacion"><strong>Ubicación:</strong></label>
                                <input type="text" class="form-control" name="ubicacion" value="{{old('ubicacion')}}">
                                <small>{{$errors->first("ubicacion")}}</small>
                                
                            </div>
                            <div class="form-group">
                                <label for="precio"><strong>Precio:</strong></label>
                                <input type="text" class="form-control" name="precio" value="{{old('precio')}}">
                                <small>{{$errors->first("precio")}}</small>
                               
                            </div>
                            <div class="d-flex justify-content-between">
                            <a href="{{ route('rutabusquedaHotelesAdmi') }}">
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </a>
                            <a href="{{ route('rutamodificarPoliticas') }}">
                                <button type="button" class="btn btn-primary">Modificar política de cancelación</button>
                            </a>
                                <button type="submit" class="btn btn-secondary">Actualizar</button>
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

