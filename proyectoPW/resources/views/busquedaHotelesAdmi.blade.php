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
@endSession

@session('guardarhotel')
    <script>
    Swal.fire({
    title: "Guardado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
@endsession

@session('editarhotel')
    <script>
    Swal.fire({
    title: "Guardado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
@endsession

@session('eliminarhotel')
    <script>
    Swal.fire({
    title: "Eliminado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
@endsession

<!--SWEETALERT DE CONFIRMACIÓN PARA ELMINAR -->
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviaremos el formulario de eliminación
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;

                // Agregar el token CSRF
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);

                // Crear un campo para el método DELETE
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                // Agregar el formulario al documento y enviarlo
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>

<div class="container mt-4">
    <!-- Botón Agregar Hotel -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('hotels.create') }}" class="btn btn-success">Agregar Hotel</a>
         <!-- Nuevo botón "Gestionar Destinos" -->
         <a href="{{route('destinos.index')}}" class="btn btn-secondary ml-2">Gestionar Destinos</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            @foreach($consulta as $hotel)
            <div class="hotel-card">
                @if($hotel->fotografias->isNotEmpty())
                    <!-- Obtener la primera fotografía asociada al hotel -->
                    <img src="{{ asset('storage/' . $hotel->fotografias->first()->url_imagen) }}" class='hotel-image' alt="Imagen del hotel">
                @else
                    <p>No hay imágenes disponibles.</p>
                @endif

                <div class="hotel-info">
                    <h5>{{$hotel->nombre}}</h5>
                    <p class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $hotel->categoria) 
                                <span>&#9733;</span> {{-- Estrella llena --}}
                            @else
                                <span>&#9734;</span> {{-- Estrella vacía --}}
                            @endif
                        @endfor
                    </p>
                    <p class="price">Desde:<span style="color: black;">${{$hotel->precio_por_noche}}</span> </p>
                    <p class="status">Estado: Disponible</p>
                    <p class="location"><span style="font-weight: bold;">Ubicación:</span> {{$hotel->ubicacion}}</p>
                    <p class="location"><span style="font-weight: bold;">Servicios:</span> {{$hotel->servicios}}</p>
                    <p class="location"><span style="font-weight: bold;">Distancia al centro:</span> {{$hotel->distancia_centro." km"}}</p>
                    <!--<p class="rating">9.5/10</p>-->
                    <p class="location"><span style="font-weight: bold;">Descripcion:</span> {{$hotel->descripcion}}</p>
                    <p class="location"><span style="font-weight: bold;">Capacidad:</span> {{$hotel->capacidad}} personas</p>
                    <p class="location">
                        <span style="font-weight: bold;">Destino:</span> 
                        {{ $hotel->destino ? $hotel->destino->nombre : 'Sin destino asignado' }}
                    </p>

                    <div class="d-flex">
                        <button class="btn btn-danger" onclick="confirmDelete('{{ route('hotels.destroy', $hotel->id) }}')">Borrar</button>
                        <a href="{{ route('hotels.edit', $hotel) }}">
                            <button class="btn btn-secondary">Editar</button>
                        </a>
                        <!-- Botón agregar Habitaciones -->
                        

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
