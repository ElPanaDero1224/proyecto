@extends('layouts.plantillanavbarA') 

@section('css')
    @vite(['resources/css/menu.css'])
@endsection


@section('modulo', '| Panel principal')
@section('seccion')


<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="icon-container">
                        <img src="{{asset('img/plane.png')}}" alt="Icono Vuelos">
                    </div>
                    <a href="{{route('vuelos.index')}}" class="btn btn-secondary mt-3">Gestionar vuelos</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="icon-container">
                        <img src="{{asset('img/hotel.png')}}" alt="Hoteles">
                    </div>
                    <a href="/hotels" class="btn btn-secondary mt-3">Gestionar hoteles</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="icon-container">
                        <img src="{{asset('img/calendar.png')}}" alt="Icono Reservas">
                    </div>
                    <a href="{{route('rutareservasAdmi')}}" class="btn btn-secondary mt-3">Gestionar reservas</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="icon-container">
                        <img src="{{asset('img/bell.png')}}" alt="Icono Notificaciones">
                    </div>
                    <a href="{{route('rutanotificaciones')}}" class="btn btn-secondary mt-3">Gestionar notificaciones</a>
                </div>
            </div>
        </div>
    </div>
</div>    


@endsection