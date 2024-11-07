<div class="card p-3 shadow-sm text-center">
    <h5>Total</h5>
    <h2 class="text-dark">${{ $total }}</h2>
    <p>Vuelos y hospedaje</p>
    <button id="btnPagar" class="btn btn-primary">Pagar</button>
</div>

<!-- Agrega SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Lógica para el botón de pago con SweetAlert
    document.getElementById('btnPagar').addEventListener('click', function() {
        Swal.fire({
            title: '¡Pago realizado!',
            text: 'Se ha realizado el pago con éxito.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    });
</script>
