@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Vuelos')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('seccion')

<div class="container mt-5">
    <div class="d-flex justify-content-end mb-3">
        <a href="#" onclick="confirmAddDestino()" class="btn btn-add me-2" style="background-color: #019AA0; color: #fff;">Agregar destino</a>
        <a href="#" onclick="confirmAddOrigen()" class="btn btn-add" style="background-color: #019AA0; color: #fff;">Agregar origen</a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Origen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ciudad de México</td>
                        <td class="text-center">
                            <a href="#" onclick="confirmModify('Ciudad de México')" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                            <button onclick="confirmDelete()" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Monterrey</td>
                        <td class="text-center">
                            <a href="#" onclick="confirmModify('Monterrey')" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                            <button onclick="confirmDelete()" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Destino</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Los Cabos</td>
                        <td class="text-center">
                            <a href="#" onclick="confirmModify('Los Cabos')" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                            <button onclick="confirmDelete()" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Puerto Vallarta</td>
                        <td class="text-center">
                            <a href="#" onclick="confirmModify('Puerto Vallarta')" class="btn btn-modificar btn-sm me-2" style="background-color: #17a2b8; color: #fff;">Modificar</a>
                            <button onclick="confirmDelete()" class="btn btn-delete btn-sm" style="background-color: #EB5C6D; color: white">Borrar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmAddDestino() {
        Swal.fire({
            title: "Agrega un nuevo destino",
            input: "text",
            inputPlaceholder: "Ingrese el nombre del destino",
            showCancelButton: true,
            confirmButtonText: "Agregar",
            showLoaderOnConfirm: true,
            preConfirm: async (destination) => {
                if (!destination) {
                    return Swal.showValidationMessage("Por favor, ingresa un destino");
                }
                return { destination };
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Destino agregado", `Se ha agregado ${result.value.destination} exitosamente`, "success");
            }
        });
    }

    function confirmAddOrigen() {
        Swal.fire({
            title: "Agrega un nuevo origen",
            input: "text",
            inputPlaceholder: "Ingrese el nombre del origen",
            showCancelButton: true,
            confirmButtonText: "Agregar",
            showLoaderOnConfirm: true,
            preConfirm: async (origin) => {
                if (!origin) {
                    return Swal.showValidationMessage("Por favor, ingresa un origen");
                }
                return { origin };
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Origen agregado", `Se ha agregado ${result.value.origin} exitosamente`, "success");
            }
        });
    }

    function confirmModify(location) {
        Swal.fire({
            title: `Modificar ${location}`,
            input: "text",
            inputPlaceholder: `Ingrese el nuevo nombre para ${location}`,
            showCancelButton: true,
            confirmButtonText: "Modificar",
            showLoaderOnConfirm: true,
            preConfirm: async (newName) => {
                if (!newName) {
                    return Swal.showValidationMessage("Por favor, ingresa un nombre nuevo");
                }
                return { newName };
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Modificado", `${location} ha sido modificado a ${result.value.newName}`, "success");
            }
        });
    }

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
                Swal.fire('Eliminado!', 'El registro ha sido eliminado.', 'success');
            }
        });
    }
</script>

@endsection
