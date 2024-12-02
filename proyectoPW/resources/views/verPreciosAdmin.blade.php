@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Vuelos')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('seccion')

<div class="container mt-5">

    {{-- Formulario para agregar un nuevo vuelo --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('precios.create') }}" class="btn btn-add me-2" style="background-color: #01a03e; color: #fff;">Agregar nueva clase/precio</a>
        <a href="{{route('vuelos.index')}}" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Mostrar Vuelos</a>
        <a href="{{ route('aerolineas.index') }}" class="btn btn-add" style="background-color: #019AA0; color: #fff;">Mostrar aerolíneas</a>
        <a href="{{route('disponibilidad_asientos.index')}}" class="btn btn-add me-2" style="background-color: #dfd662; color: #000000;">Mostrar Asientos</a>
    </div>

    {{-- Tabla para listar clases y precios --}}
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre de la clase</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulta as $precio)
                        <tr>
                            <td>{{ $precio->clase }}</td>
                            <td>{{ $precio->precio }}</td>
                            <td class="text-center">
                                <a href="{{ route('precios.edit', $precio->id) }}" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                                <button onclick="confirmDelete({{ $precio->id }}, '{{ $precio->clase }}')" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white;">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Mostrar mensajes de éxito o error
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    @elseif(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    @endif

    // Confirmación para borrar un registro
    function confirmDelete(id, clase) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Se eliminará la clase "${clase}". Esta acción no se puede deshacer.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = `/precios/${id}`;
                form.style.display = 'none';

                // Token CSRF
                let csrfInput = document.createElement('input');
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                csrfInput.type = 'hidden';
                form.appendChild(csrfInput);

                // Método DELETE
                let methodInput = document.createElement('input');
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                methodInput.type = 'hidden';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>

@endsection
