<!-- Modal Actualizar -->
<div class="modal fade" id="insert{{ $carrito_reservacion->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content fw-bold">

      <div class="modal-header">
        <h1 class="modal-title fs-4 fw-bold text-danger" id="staticBackdropLabel">Agregar vuelo / Hotel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body text-primary">
        <form method="POST" action="{{ route('carrito.store') }}">
    @csrf

    <div class="mb-3">
        <label for="reserva_hotel_id" class="form-label">Selecciona un Hotel:</label>
        <select class="form-select" name="reserva_hotel_id" id="reserva_hotel_id">
            <option value="">Selecciona un hotel</option>
            @foreach($hotelesDisponibles as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="vuelos_en_reservas_vuelos_id" class="form-label">Selecciona un Vuelo:</label>
        <select class="form-select" name="vuelos_en_reservas_vuelos_id" id="vuelos_en_reservas_vuelos_id">
            <option value="">Selecciona un vuelo</option>
            @foreach($vuelosDisponibles as $vuelo)
                <option value="{{ $vuelo->id }}">{{ $vuelo->vuelo->origen }} - {{ $vuelo->vuelo->destino }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="precio_total_carrito" class="form-label">Precio Total:</label>
        <input type="number" class="form-control" name="precio_total_carrito" id="precio_total_carrito" required>
    </div>

    <div class="mb-3">
        <label for="usuario_id" class="form-label">Usuario ID:</label>
        <input type="number" class="form-control" name="usuario_id" id="usuario_id" required>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    </div>
</form>

    </div>
  </div>
</div>
