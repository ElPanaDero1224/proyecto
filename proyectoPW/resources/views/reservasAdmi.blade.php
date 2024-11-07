@extends('layouts.plantillanavbarA') 
@section('modulo', '| Gestionar Reservas')
@section('seccion')

<div class="container mt-4">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/app.js', 'public\css\reservasAdmi.css']) 
    <title>Reporte de Vuelos</title>
</head>
<body>

<div class="container mt-4">
<div class="card p-4 mb-4">
    <h5>Generar Reporte</h5>
    <div class="form-row d-flex align-items-center">
        <div class="form-group col-md-3">
            <label for="filterDate">Filtrar por fecha:</label>
            <select id="filterDate" class="form-control">
                <option>Hace 2 semanas</option>
                <option>Hace 1 mes</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="destination">Destino:</label>
            <select id="destination" class="form-control">
                <option>Itxapa</option>
                <option>Otro</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="airline">Aerolíneas:</label>
            <select id="airline" class="form-control">
                <option>Aeroméxico</option>
                <option>Otra</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="client">Clientes:</label>
            <select id="client" class="form-control">
                <option>Todos</option>
            </select>
        </div>
    </div>
</div>


    <div class="card p-4 mb-4">
        <h5>Destino entre el top de los 3 más visitados</h5>
        <p>Vuelos realizados a Itxapa desde hace 2 semanas por Aeroméxico</p>
        
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="chart-container">
                    <p class="chart-text">Gráfico</p>
                </div>
                <ul class="list-unstyled mt-3">
                    <li><span class="legend-color reserved"></span> Reservados hechos</li>
                    <li><span class="legend-color scheduled"></span> Reservados programados</li>
                    <li><span class="legend-color canceled"></span> Reservados pero cancelados</li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Ingresos Generados:</h5>
                <h3 class="text-success">$4,000,500</h3>
                <p>Total de vuelos reservados en Aeroméxico a Itxapa en el periodo 20.09.2024 - 27.11.2024</p>
                <h1>23,456</h1>
            </div>
        </div>
    </div>

    <div class="card p-4 mb-4">
        <table class="table table-bordered">
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
                    <td>123456</td>
                    <td>Aeroméxico</td>
                    <td>08:15 am - 11:30 am</td>
                    <td>8 horas</td>
                    <td>$2323</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>456789</td>
                    <td>Volaris</td>
                    <td>09:45 am - 01:20 pm</td>
                    <td>7 horas</td>
                    <td>$4156</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>456124</td>
                    <td>Aeroméxico</td>
                    <td>12:00 pm - 02:50 pm</td>
                    <td>3 horas</td>
                    <td>$1567</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
    </div>


        @session('exito')
        <script>
            Swal.fire({
                title: "Exportación exitosa!",
                text: '{{ $value }}',
                icon: "success",
                confirmButtonText: "Acpetar"});
        </script>
        @endsession

    <div class="card p-4 mb-4">
    <form method="POST" action="/reservasAdmiexportar">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="tipoexportar">Exportar</label>
                <select name="tipoexportar" class="form-control">
                    <option value="PDF">PDF</option>
                    <option value="Excel">Excel</option>
                </select>
            </div>
            <div class="form-group col-md-2 align-self-end">
                <button class="btn btn-success btn-block">Exportar</button>
            </div>
        </div>
    </form>
    </div>
</div>

</body>
</html>

</div>

@endsection
