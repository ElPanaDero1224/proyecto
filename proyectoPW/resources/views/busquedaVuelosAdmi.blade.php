@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Vuelos')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('seccion')

<div class="container mt-5">

    {{-- Formulario para agregar un nuevo vuelo --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{route('vuelos.create')}}" class="btn btn-add me-2" style="background-color: #01a03e; color: #fff;">Agregar nuevo vuelo</a>
        <a href="{{route('aerolineas.index')}}" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Mostrar aerolíneas</a>
        <a href="{{route('precios.index')}}" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Mostrar precios/clases</a>
        <a href="{{route('disponibilidad_asientos.index')}}" class="btn btn-add me-2" style="background-color: #dfd662; color: #000000;">Mostrar Asientos</a>
    </div>

    {{-- Filtros --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="filter-origen" class="form-label">Origen</label>
            <input type="text" id="filter-origen" class="form-control" placeholder="Buscar por origen">
        </div>
        <div class="col-md-3">
            <label for="filter-destino" class="form-label">Destino</label>
            <input type="text" id="filter-destino" class="form-control" placeholder="Buscar por destino">
        </div>
        <div class="col-md-3">
            <label for="filter-fecha" class="form-label">Fecha de salida</label>
            <input type="date" id="filter-fecha" class="form-control">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button id="reset-filters" class="btn btn-secondary w-100">Resetear Filtros</button>
        </div>
    </div>

    {{-- Tabla de vuelos --}}
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="vuelos-table">
                <thead>
                    <tr>
                        <th>Numero de vuelo</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha de salida</th>
                        <th>Fecha de llegada</th>
                        <th>Duración</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consulta as $vuelo)
                    <tr>
                        <td>{{ $vuelo->numero_vuelo }}</td>
                        <td class="origen">{{ $vuelo->origen }}</td>
                        <td class="destino">{{ $vuelo->destino }}</td>
                        <td class="fecha-salida">{{ $vuelo->fecha_salida }}</td>
                        <td>{{ $vuelo->fecha_llegada }}</td>
                        <td>{{ $vuelo->duracion }} - hr</td>
                        <td class="text-center">
                            <a href="{{route('vuelos.edit', $vuelo->id)}}" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                            <button onclick="confirmDelete('{{ $vuelo->id }}', '{{ $vuelo->numero_vuelo }}')" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





<script>
// Función para aplicar filtros
document.addEventListener('DOMContentLoaded', () => {
        const origenInput = document.getElementById('filter-origen');
        const destinoInput = document.getElementById('filter-destino');
        const fechaInput = document.getElementById('filter-fecha');
        const resetButton = document.getElementById('reset-filters');
        const tableRows = document.querySelectorAll('#vuelos-table tbody tr');

        function filterTable() {
            const origenValue = origenInput.value.toLowerCase();
            const destinoValue = destinoInput.value.toLowerCase();
            const fechaValue = fechaInput.value;

            tableRows.forEach(row => {
                const origenText = row.querySelector('.origen').textContent.toLowerCase();
                const destinoText = row.querySelector('.destino').textContent.toLowerCase();
                const fechaText = row.querySelector('.fecha-salida').textContent;

                const matchesOrigen = origenText.includes(origenValue);
                const matchesDestino = destinoText.includes(destinoValue);
                const matchesFecha = !fechaValue || fechaText === fechaValue;

                if (matchesOrigen && matchesDestino && matchesFecha) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Event listeners para filtros
        origenInput.addEventListener('input', filterTable);
        destinoInput.addEventListener('input', filterTable);
        fechaInput.addEventListener('change', filterTable);

        // Resetear filtros
        resetButton.addEventListener('click', () => {
            origenInput.value = '';
            destinoInput.value = '';
            fechaInput.value = '';
            filterTable();
        });
    });

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
            text: `Se eliminará el vuelo "${numeroVuelo}". Esta acción no se puede deshacer.`,
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
                form.action = `/vuelos/${id}`;
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
