@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Destinos')
@section('seccion')
@vite(['resources/js/app.js'])
<link href="{{ asset('css/busquedahotelesadmi.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@session('guardardestino')
    <script>
    Swal.fire({
    title: "Guardado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
@endsession

@session('editardestino')
    <script>
    Swal.fire({
    title: "Editado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
@endsession

@session('eliminardestino')
    <script>
    Swal.fire({
    title: "Eliminado",
    text: "{{$value}}",
    icon: "success"
    });
    </script>
@endsession

<!--SWEETALERT DE CONFIRMACIÓN PARA ELIMINAR -->
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
<a href="{{ route('hotels.index') }}" class="btn btn-secondary mb-4">
        <i class="fas fa-arrow-left"></i> Regresar a la lista de hoteles
    </a>
<div class="container mt-4">
    <!-- Botón Agregar Destino -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('destinos.create')}}" class="btn btn-success">Agregar Destino</a>
    </div>

    <!-- Tabla de Destinos -->
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($destinos as $destino)
                    <!-- Ejemplo de un destino listado -->
                    <tr>
                        <td>{{$destino->id}}</td>
                        <td>{{$destino->nombre}}</td>
                        <td>
                            <!-- Botón para Eliminar con confirmación -->
                            <form action="{{ route('destinos.destroy', $destino->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete(this.form.action)">Eliminar</button>
                            </form>

                            <!-- Botón para Editar -->
                            <a href="{{ route('destinos.edit', $destino->id) }}">
                                <button class="btn btn-secondary">Editar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                    <!-- Fin del listado de destinos -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Paginación -->
    <div class="row mt-4">
        <div class="col-md-12">
            <!-- Aquí se puede agregar la paginación si es necesario -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
