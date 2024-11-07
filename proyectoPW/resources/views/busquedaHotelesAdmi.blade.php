@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Hoteles')
@section('seccion')
@vite(['resources/js/app.js'])
<link href="{{ asset('css/busquedahotelesadmi.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@session('buscarhoteladmi')
    <script>
    Swal.fire({
    title: "Búsqueda realizada",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
    @endsession


<div class="container mt-4">
    <div class="search-bar">
        <form action="/realizarbusquedahotelesadmi" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="destino" placeholder="Destino">
                    <small>{{$errors->first('destino')}}</small>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="check_in" placeholder="Check in">
                    <small>{{$errors->first('check_in')}}</small>
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control" name="check_out" placeholder="Check out">
                    <small>{{$errors->first('check_out')}}</small>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" name="num_habitaciones" placeholder="Número de habitaciones">
                    <small>{{$errors->first('num_habitaciones')}}</small>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" name="num_huespedes" placeholder="Número de huéspedes">
                    <small>{{$errors->first('num_huespedes')}}</small>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>


    <div class="row mt-4">
        <div class="col-md-12">
            <div class="hotel-card">
                <img src="{{asset('images/detallesHoteles_img1.png')}}" alt="Hotel Riviera" class="hotel-image">
                <div class="hotel-info">
                    <h5>Hotel Riviera: Suite Acapulco</h5>
                    <p class="rating">★★★★★</p>
                    <p class="price">Desde: $5,000</p>
                    <p class="status">Estado: Disponible</p>
                    <p class="rating">9.5/10</p>
                    <p>Un cuarto con vista al mar es una habitación en un hotel que ofrece una vista panorámica directa del océano desde sus ventanas o balcón.</p>
                    <div class="d-flex">
                    <button class="btn btn-danger" onclick="showDeleteAlert()">Borrar</button>
                    <a href="{{ route('rutaeditarHotel') }}">
                        <button class="btn btn-secondary">Editar</button>
                    </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
function showDeleteAlert() {
    Swal.fire(
        '¡Borrado!',
        'El hotel ha sido borrado exitosamente.',
        'success'
    );
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
