@extends('layouts.plantillanavbarA')

@section('modulo', 'Agregar Hotel')

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
 <!-- Encabezado principal -->
 <div class="text-center mb-4">
        <h1 class="display-4">Agregar Hotel</h1>
        <p class="text-muted">Llena los campos necesarios para agregar un nuevo hotel a la lista.</p>
    </div>

    <div class="container mt-3">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('images/detallesHoteles_img1.png')}}" class="card-img" alt="Vista de la playa">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                            <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="titulo"><strong>Nombre del hotel:</strong></label>
                                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
                                <small>{{$errors->first("nombre")}}</small>
                            </div>

                            <div class="form-group">
                                <label for="ubicacion"><strong>Ubicación:</strong></label>
                                <input type="text" class="form-control" name="ubicacion" value="{{old('ubicacion')}}">
                                <small>{{$errors->first("ubicacion")}}</small>
                                
                            </div>
                            <div class="form-group">
                                <label for="categoria"><strong>Categoría:</strong></label>
                                <select class="form-control" name="categoria">
                                    <option value="" disabled selected>Seleccione una categoría</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ old('categoria') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                <small>{{ $errors->first("categoria") }}</small>
                            </div>

                            <div class="form-group">
                                <label for="descripcion"><strong>Descripción:</strong></label>
                                <textarea class="form-control" name="descripcion" rows="1" value="{{old('descripcion')}}"></textarea>
                                <small>{{$errors->first("descripcion")}}</small>
            
                            </div>
                            <div class="form-group">
                                <label for="descripcion"><strong>Servicios:</strong></label>
                                <textarea class="form-control" name="servicios" rows="1" value="{{old('servicios')}}"></textarea>
                                <small>{{$errors->first("servicios")}}</small>
            
                            </div>

                            <div class="form-group">
                                <label for="descripcion"><strong>Distancia a puntos turisticos:</strong></label>
                                <textarea class="form-control" name="distancia_puntos_turisticos" rows="1" value="{{old('distancia_puntos_turisticos')}}"></textarea>
                                <small>{{$errors->first("distancia_puntos_turisticos")}}</small>
            
                            </div>
                            <div class="form-group">
                                <label for="titulo"><strong>Distancia al centro(km):</strong></label>
                                <input type="number" class="form-control" name="distancia_centro" value="{{old('distancia_centro')}}">
                                <small>{{$errors->first("distancia_centro")}}</small>
                            </div>
                            <div class="form-group">
                                <label for="descripcion"><strong>Politicas de cancelacion:</strong></label>
                                <textarea class="form-control" name="politicas_cancelacion" rows="1" value="{{old('politicas_cancelacion')}}"></textarea>
                                <small>{{$errors->first("politicas_cancelacion")}}</small>
                            </div>
                            <div class="form-group">
                                <label for="titulo"><strong>Capacidad(Número de Habitaciones):</strong></label>
                                <input type="number" class="form-control" name="capacidad" value="{{old('capacidad')}}">
                                <small>{{$errors->first("capacidad")}}</small>
                            </div>
                            <div class="form-group">
                                <label for="titulo"><strong>Precio por noche(Solo número):</strong></label>
                                <input type="number" class="form-control" name="precio_por_noche" value="{{old('precio_por_noche')}}">
                                <small>{{$errors->first("precio_por_noche")}}</small>
                            </div>

                            <div class="form-group">
                            <label for="destino_id"><strong>Destino:</strong></label>
                            <select class="form-control" name="destino_id" id="destino_id">
                                <option value="" disabled selected>Seleccione un destino</option>
                                @foreach ($destinos as $destino)
                                    <option value="{{ $destino->id }}" {{ old('destino_id') == $destino->id ? 'selected' : '' }}>
                                        {{ $destino->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <small>{{ $errors->first("destino_id") }}</small>
                        </div>
                            <!--<div class="form-group">
                                <label for="precio"><strong>Precio:</strong></label>
                                <input type="text" class="form-control" name="precio" value="{{old('precio')}}">
                                <small>{{$errors->first("precio")}}</small>
                               
                            </div>-->
                            <div class="form-group">
                                <label for="fotografias"><strong>Fotografías:</strong></label>
                                <input type="file" class="form-control" name="fotografias[]" multiple>
                                <small>{{ $errors->first("fotografias") }}</small>
                            </div>

                            <div class="d-flex justify-content-between">
                            <a href="{{route('hotels.index')}}">
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </a>
                                <button type="submit" class="btn btn-secondary">Guardar hotel</button>
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

