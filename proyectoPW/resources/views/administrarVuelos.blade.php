@extends('layouts.plantillanavbarA') 
@section('modulo', '| Administrar vuelos')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('seccion')



<div class="table-container">
    <h5>Origen: Querétaro</h5>
    <h5>Destino: Ixtapa</h5>
    <a  class="btn btn-add mb-3"  href='{{route('registroNewVuelo')}}' style="background-color: #4FBBFE; color:white">Agregar vuelos para este destino</a>

    
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Número de vuelo</th>
                <th>Aerolinea</th>
                <th>Horario</th>
                <th>Duración del vuelo</th>
                <th>Precio por pasajero</th>
                <th>Escalas</th>
                <th>Funciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>123456</td>
                <td>Aeromexico</td>
                <td>08:15 am - 11:30 am</td>
                <td>8 horas</td>
                <td>$2333</td>
                <td>-</td>
                <td>
                    <a href="{{route('modVuelDest')}}" class="btn btn-modify btn-sm" style="background-color: #4FBBFE; color: white">Modificar</a>
                    <button onclick="confirmDelete()" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                </td>
            </tr>
            <tr>
                <td>456789</td>
                <td>Volaris</td>
                <td>09:45 am - 01:20 pm</td>
                <td>7 horas</td>
                <td>$4568</td>
                <td>Cancún</td>
                <td>
                    <a href="{{route('modVuelDest')}}" class="btn btn-modify btn-sm" style="background-color: #4FBBFE; color: white">Modificar</a>
                    <button onclick="confirmDelete()" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
            </tr>
           
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        Swal.fire({
            title: '¿Seguro que quieres eliminar este campo?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí puedes agregar la lógica para eliminar el vuelo.
                Swal.fire(
                    'Eliminado!',
                    'El registro ha sido eliminado.',
                    'success'
                )
            }
        })
    }
</script>

@endsection