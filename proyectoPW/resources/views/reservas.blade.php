@extends('layouts.plantillanavbarU') 
@section('modulo', '| Carrito')
@section('seccion')

<link href="{{ asset('/css/carrito.css') }}" rel="stylesheet">
<div class="container mt-4">
    <div class="row justify-content-center">
        <!-- Componente de vuelo -->
        <div class="col-md-4 mb-4">
            <x-flight-card 
                ruta="Querétaro - Ixtapa Zihuatanejo"
                origen="Querétaro" 
                destino="Ixtapa Zihuatanejo"
                fechaIda="28 sep 2024"
                fechaVuelta="30 sep 2024"
                precio="2333"
                duracion="7h 21m" 
            />
            <button class="btn btn-danger w-100 mt-3" onclick="confirmCancelReservation('vuelo')">Cancelar Reserva</button>
        </div>
        
        <!-- Componente de hotel -->
        <div class="col-md-4 mb-4">
            <x-hotel-card 
                hotel="Hotel Fontan Ixtapa"
                checkin="28 sep 2024 - 03:00"
                checkout="30 sep 2024 - 12:00"
                precio="5000"
            />
            <button class="btn btn-danger w-100 mt-3" onclick="confirmCancelReservation('hotel')">Cancelar Reserva</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Función para mostrar la alerta de confirmación
    function confirmCancelReservation(type) {
        Swal.fire({
            title: '¿Seguro que deseas cancelar la reserva?',
            html: `
                <p>Por favor, confirma que has leído nuestras políticas de cancelación.</p>
                <div class="form-check text-start">
                    <input type="checkbox" id="confirmPolicies" class="form-check-input">
                    <label for="confirmPolicies" class="form-check-label">He leído las políticas de cancelación</label>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const checkbox = document.getElementById('confirmPolicies');
                if (!checkbox.checked) {
                    Swal.showValidationMessage('Debes confirmar que has leído las políticas de cancelación.');
                }
                return checkbox.checked;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Reserva Cancelada',
                    text: `La reserva de tu ${type} ha sido cancelada exitosamente.`,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    }
</script>

@endsection
