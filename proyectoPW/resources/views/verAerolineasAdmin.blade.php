@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Vuelos')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('seccion')

<div class="container mt-5">

    {{-- formulario para agregar un nuevo vuelo --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('aerolineas.create')}}" class="btn btn-add me-2" style="background-color: #01a03e; color: #fff;">Agregar nueva aerolinea</a>
        <a href="{{route('vuelos.index')}}" class="btn btn-add" style="background-color: #019AA0; color: #fff;">Mostrar Vuelos</a>
        <a href="{{route('precios.index')}}" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Mostrar precios/clases</a>
        <a href="{{route('disponibilidad_asientos.index')}}" class="btn btn-add me-2" style="background-color: #dfd662; color: #000000;">Mostrar Asientos</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if($consulta->isEmpty())
                <p>No hay aerolíneas disponibles.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre de la aerolínea</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($consulta as $ar)
                        <tr>
                            <td>{{$ar->nombre}}</td>
                            <td class="text-center">
                                <a href="{{ route('aerolineas.edit', $ar->id) }}" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                                
                                <!-- Botón de borrar -->
                                <button onclick="confirmDelete({{ $ar->id }}, '{{ $ar->nombre }}')" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<script>
    // Mostrar mensaje de éxito
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            showConfirmButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    @endif

    // Función para confirmar borrado
    function confirmDelete(id, nombre) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Se eliminará la aerolínea "${nombre}". Esta acción no se puede deshacer.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Crear y enviar el formulario para eliminar
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = `/aerolineas/${id}`;
                form.style.display = 'none';

                // Agregar token CSRF
                let csrfInput = document.createElement('input');
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                csrfInput.type = 'hidden';
                form.appendChild(csrfInput);

                // Agregar el método DELETE
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
