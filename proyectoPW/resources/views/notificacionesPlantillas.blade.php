@extends('layouts.plantillanavbarAnoti') 
@section('modulo', '| Notificaciones plantillas')
@section('seccion')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['public\css\notificacionesPlantillas.css']) 

<div class="container mt-4">
    <body>
        <div class="container mt-4">
            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="plantillas" role="tabpanel">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Confirmación de registro</h5>
                            <div>
                                <p contenteditable="true" class="editable">Su registro en TURISTA SIN MAPS se ha completado correctamente.</p>

                                @session('exito')
                                <script>
                                    Swal.fire({
                                        title: "Actualizado!",
                                        text: '{{ $value }}',
                                        icon: "success",
                                        confirmButtonText: "Aceptar"});
                                </script>
                                @endsession

                                <form method="POST" action="/confirmacionregistro">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h5>Recordatorio</h5>
                            <div>
                                <p><strong>Hotel</strong><br>
                                <span contenteditable="true" class="editable">Le recordamos que tiene una reserva en el hotel [hotel] programada dentro de 48 horas. con la siguiente información [resumen de reserva hotel]</span></p>
                                <form method="POST" action="/hotel">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                                </form>
                            </div>
                            <div>
                                <p><strong>Vuelo</strong><br>
                                <span contenteditable="true" class="editable">Le recordamos que tiene un vuelo reservado con destino a [destino] programado dentro de 48 horas. con la siguiente información [resumen de reserva vuelo]</span></p>
                                <form method="POST" action="/vuelo">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h5>Actualizaciones de vuelos</h5>
                            <div>
                                <p><strong>Cancelación</strong><br>
                                <span contenteditable="true" class="editable">Le informamos que su vuelo con destino a [destino] ha sido cancelado por motivo de [motivo de cancelación]. Nos disculpamos por los inconvenientes.</span></p>
                                <form method="POST" action="/cancelacion">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                                </form>
                            </div>
                            <div>
                                <p><strong>Retraso</strong><br>
                                <span contenteditable="true" class="editable">Le informamos que su vuelo con destino a [destino] se ha retrasado por un lapso de [tiempo]. Agradecemos su comprensión</span></p>
                                <form method="POST" action="/retraso">
                                    @csrf
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="programados" role="tabpanel">
                    <p>Sección de Programados en desarrollo...</p>
                </div>
            </div>
        </div>
    </body>
</div>
@endsection
