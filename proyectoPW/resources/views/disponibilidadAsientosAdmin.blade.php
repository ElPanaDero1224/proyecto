@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Vuelos')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('seccion')

<div class="container mt-5">

    {{-- formulario para agregar un nuevo vuelo --}}

    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('disponibilidad_asientos.create')}}" class="btn btn-add me-2" style="background-color: #01a03e; color: #fff;">Agregar nuevos asientos</a>
        <a href="{{route('aerolineas.index')}}" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Mostrar aerolineas</a>
        <a href="{{route('precios.index')}}" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Mostrar precios/clases</a>
        <a href="{{route('vuelos.index')}}" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Mostrar vuelos</a>
    </div>

    {{-- Mostrar aerolineas --}}

    <div class="container mt-5">

        {{-- Tabla para mostrar la disponibilidad de asientos --}}
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-4">Disponibilidad de Asientos</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tipo de Asiento</th>
                            <th>Disponibilidad Total</th>
                            <th>Uso por Adultos</th>
                            <th>Uso por Niños</th>
                            <th>Uso por Ancianos</th>
                            <th>Numero Del vuelo</th>
                            <th>Acciones</th> {{-- Nueva columna para botones --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asientos as $asiento)
                        <tr>
                            <td>{{ $asiento->tipo_asiento }}</td>
                            <td>{{ $asiento->disponibilidad_total }}</td>
                            <td>{{ $asiento->uso_adultos }}</td>
                            <td>{{ $asiento->uso_niños }}</td>
                            <td>{{ $asiento->uso_ancianos }}</td>
                            <td>{{ $asiento->numero_vuelo }}</td>
                            <td class="text-center">
                                {{-- Botón de Modificar --}}
                                <a href="{{route('disponibilidad_asientos.edit', $asiento->asiento_id)}}" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                                
                                {{-- Botón de Borrar --}}
                                <button onclick="confirmDelete('{{ $asiento->asiento_id }}', '{{ $asiento->numero_vuelo }}')" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    // Mostrar mensaje de éxito o error
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
            confirmButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        });
    @endif

    // Función para confirmar borrado
    function confirmDelete(id, numeroVuelo) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `Se eliminará los asientos del vuelo "${numeroVuelo}". Esta acción no se puede deshacer.`,
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
            form.action = `/disponibilidad_asientos/${id}`;  // Asegúrate que esta ruta sea correcta

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
