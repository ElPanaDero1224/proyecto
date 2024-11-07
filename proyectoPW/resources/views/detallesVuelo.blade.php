@extends('layouts.plantillanavbarU') 
@section('modulo', '| Detalles vuelo')
@section('seccion')

<div class="container mt-4">
    <div class="alert alert-primary text-center">
        {{ $vuelo['asientos_disponibles'] }} asientos disponibles
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Número de vuelo</th>
                <th>Aerolínea</th>
                <th>Horario</th>
                <th>Duración del vuelo</th>
                <th>Precio por pasajero</th>
                <th>Escalas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $vuelo['numero'] }}</td>
                <td>{{ $vuelo['aerolinea'] }}</td>
                <td>{{ $vuelo['horario'] }}</td>
                <td>{{ $vuelo['duracion'] }} horas</td>
                <td>${{ $vuelo['precio'] }}</td>
                <td>{{ $vuelo['escalas'] }}</td>
            </tr>
        </tbody>
    </table>

    <div class="p-3 mt-3 rounded" style="background-color: #62b5a7; color: white;">
        <h4>Descripción del vuelo</h4>
        <p>
            Este vuelo es operado por {{ $vuelo['aerolinea'] }} y ofrece una experiencia de viaje cómoda y segura. 
            Con salida a las {{ $vuelo['horario'] }}, el trayecto de aproximadamente {{ $vuelo['duracion'] }} horas 
            promete una llegada puntual a su destino. Disfrute de servicios exclusivos a bordo, incluyendo comidas 
            y entretenimiento para un vuelo placentero. Aproveche el excelente precio de ${{ $vuelo['precio'] }} 
            por pasajero y viaje sin escalas para mayor comodidad.
        </p>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="clase" class="form-label">Clases</label>
                <select class="form-select" id="clase" name="clase">
                    <option>Económica</option>
                    <option>Ejecutiva</option>
                    <option>Primera Clase</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label for="personas" class="form-label">No. Personas</label>
                <select class="form-select" id="personas" name="personas">
                    <option>1 adulto</option>
                    <option>2 adultos</option>
                    <option>3 adultos</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-secondary" id="add-to-cart">Añadir al carrito</button>
        </div>
    </div>
</div>

<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('add-to-cart').addEventListener('click', function() {
        Swal.fire({
            icon: 'success',
            title: '¡Añadido!',
            text: 'El vuelo se ha añadido correctamente al carrito.',
            confirmButtonColor: '#3085d6'
        });
    });
</script>

@endsection

