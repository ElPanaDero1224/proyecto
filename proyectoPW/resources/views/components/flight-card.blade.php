<div class="card p-3 shadow-sm">
    <h5 class="mb-3"><i class="fa fa-plane"></i> {{ $origen }} - {{ $destino }}</h5>
    <p>Ida y vuelta, 1 adulto</p>
    <div class="d-flex justify-content-between">
        <div>
            <p class="mb-0">IDA</p>
            <small>{{ $fechaIda }}</small>
        </div>
        <div>
            <p class="mb-0">Vuelo</p>
            <small>{{ $duracion }}</small>
        </div>
    </div>
    <hr>
    <h4 class="text-center text-dark">${{ $precio }}</h4>
</div>
