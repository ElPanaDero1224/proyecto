@extends('layouts.plantillanavbarAnoti') 
@section('modulo', '| Notificaciones programados')
@section('seccion')


    @vite(['resources/js/app.js', 'public\css\notificacionesProgramados.css'])

<body>

<div class="container mt-4">
    <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="programados" role="tabpanel">
            <div class="container">

                <h5>Confirmación de registro</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Plantilla</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Samuel Elizalde</td>
                                <td>samuel@gmail.com</td>
                                <td>Confirmación de registro</td>
                                <td>Enviada</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5>Recordatorio</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Plantilla</th>
                                <th>Estado</th>
                                <th>No. reservación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Samuel Elizalde</td>
                                <td>samuel@gmail.com</td>
                                <td>Recordatorio vuelo</td>
                                <td>Programado en 3 días</td>
                                <td>15284</td>
                            </tr>
                            <tr>
                                <td>Samuel Elizalde</td>
                                <td>samuel@gmail.com</td>
                                <td>Recordatorio hotel</td>
                                <td>Programado en 4 días</td>
                                <td>15284</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5>Actualizaciones de vuelos</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Plantilla</th>
                                <th>Estado</th>
                                <th>No. reservación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Samuel Elizalde</td>
                                <td>samuel@gmail.com</td>
                                <td>Retraso</td>
                                <td>Enviado</td>
                                <td>15284</td>
                            </tr>
                            <tr>
                                <td>Pedro Barrera</td>
                                <td>pedro@gmail.com</td>
                                <td>Cancelación</td>
                                <td>Enviado</td>
                                <td>15284</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

        <div class="tab-pane fade" id="plantillas" role="tabpanel">

        </div>
    </div>
</div>

</body>


@endsection
