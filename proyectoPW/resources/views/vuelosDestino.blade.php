@extends('layouts.plantillanavbarU') 
@section('modulo', '| Vuelos por destino')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@section('seccion')


<div class="container mt-4">
    <div class="bg-light p-4 rounded shadow-sm">
        <h5 class="text-primary fw-bold">Buscar Vuelos</h5>
        <form action="/busquedaVuelosSearch" method="POST">
            @csrf
            <div class="row">
                <!-- Campo de Origen -->
                <div class="col-md-3 mb-3">
                    <label for="origen" class="form-label">Origen</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="origen" 
                        name="origen" 
                        placeholder="Ingresa de dónde viajas" 
                        value="{{ old('origen') }}"
                        aria-describedby="origenHelp">
                    <small id="origenHelp" class="text-muted">Por ejemplo, CDMX o Nueva York</small>
                    <small class="text-danger">{{ $errors->first('origen') }}</small>
                </div>

                <!-- Campo de Destino -->
                <div class="col-md-3 mb-3">
                    <label for="destino" class="form-label">Destino</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="destino" 
                        name="destino" 
                        placeholder="Ingresa hacia dónde vas" 
                        value="{{ old('destino') }}"
                        aria-describedby="destinoHelp">
                    <small id="destinoHelp" class="text-muted">Por ejemplo, Madrid o Cancún</small>
                    <small class="text-danger">{{ $errors->first('destino') }}</small>
                </div>

                <!-- Campo de Fecha de Ida -->
                <div class="col-md-2 mb-3">
                    <label for="fecha_ida" class="form-label">Fecha de Ida</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        id="fecha_ida" 
                        name="fecha_ida" 
                        value="{{ old('fecha_ida') }}">
                    <small class="text-danger">{{ $errors->first('fecha_ida') }}</small>
                </div>

                <!-- Campo de Fecha de Vuelta -->
                <div class="col-md-2 mb-3">
                    <label for="fecha_vuelta" class="form-label">Fecha de Vuelta</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        id="fecha_vuelta" 
                        name="fecha_vuelta" 
                        value="{{ old('fecha_vuelta') }}">
                    <small class="text-danger">{{ $errors->first('fecha_vuelta') }}</small>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="numero_pasajeros" class="form-label">Número de pasajeros</label>
                    <select class="form-select" id="numero_pasajeros" name="numero_pasajeros">
                        <option value="">Selecciona</option>
                        <option value="10">Menor a 10</option>
                        <option value="20">Menor a 20</option>
                        <option value="30">Menor a 30</option>
                        <option value="40">Menor a 40</option>
                        <option value="50">Menor a 50</option>
                    </select>
                    <small class="text-danger">{{ $errors->first('numero_pasajeros') }}</small>
                </div>

                <!-- Botón de búsqueda -->
                <div class="col-md-2 mb-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                    <a href="/vuelosDestino" class="btn btn-secondary">Reestablecer</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container mt-4">
    <div class="bg-light p-4 rounded shadow-sm">
        <h5 class="text-primary fw-bold">Vuelos</h5>
        <form id="filtro-form">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="fecha-ida" class="form-label">Fecha de Ida</label>
                    <input type="text" class="form-control filtro" id="fecha-ida" name="fecha_ida" placeholder="Selecciona fecha y hora">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="fecha-vuelta" class="form-label">Fecha de Vuelta</label>
                    <input type="text" class="form-control filtro" id="fecha-vuelta" name="fecha_vuelta" placeholder="Selecciona fecha y hora">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="precio" class="form-label">Precios</label>
                    <select class="form-select filtro" id="precio" name="precio">
                        <option value="">Todos</option>
                        <option value="500">Menor a 500</option>
                        <option value="1000">Menor a 1000</option>
                        <option value="1500">Menor a 1500</option>
                        <option value="2000">Menor a 2000</option>
                        <option value="5000">Menor a 5000</option>
                    </select>
                </div>
                
                <div class="col-md-3 mb-3">
                    <label for="aerolinea" class="form-label">Aerolínea</label>
                    <select class="form-select filtro" id="aerolinea" name="aerolinea">
                        <option value="">Todas</option>
                        @foreach($aerolinea as $ar)
                        <option value="{{ $ar->nombre }}">{{ $ar->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="escalas" class="form-label">Escalas</label>
                    <select class="form-select filtro" id="escalas" name="escalas">
                        <option value="">Todos</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                



                <div class="col-md-3">
                    <button type="button" class="btn btn-secondary mt-4" id="reset-filters">Restablecer Filtros</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container mt-4">
    <table class="table table-bordered" id="vuelos-table">
        <thead>
            <tr>
                <th>Número de vuelo</th>
                <th>Aerolínea</th>
                <th>Horario</th>
                <th>Duración</th>
                <th>Precio por pasajero</th>
                <th>Escalas</th>
                <th>Asientos Disponibles</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consulta as $vuelo)
            <tr>
                <td>{{ $vuelo->numero_vuelo }}</td>
                <td class="aerolinea">{{ $vuelo->aerolinea }}</td>
                <td class="fecha-salida">{{ $vuelo->fecha_salida }} - {{ $vuelo->fecha_llegada }}</td>
                <td>{{ $vuelo->duracion }}</td>
                <td class="precio">{{ $vuelo->precio }}</td>
                <td>{{ $vuelo->escalas !== null && $vuelo->escalas ? 'Sí' : 'No' }}</td>
                <td>{{ $vuelo->disponibilidadReferencia }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('filtro-form');
    const rows = document.querySelectorAll('#vuelos-table tbody tr');
    const resetButton = document.getElementById('reset-filters');

    form.addEventListener('input', () => {
    const filters = {
        fechaIda: document.getElementById('fecha-ida').value,
        fechaVuelta: document.getElementById('fecha-vuelta').value,
        precio: document.getElementById('precio').value,
        aerolinea: document.getElementById('aerolinea').value,
        escalas: document.getElementById('escalas').value
    };

    rows.forEach(row => {
        const aerolinea = row.querySelector('.aerolinea').textContent.trim();
        const fechaSalida = new Date(row.querySelector('.fecha-salida').textContent.split(' - ')[0].trim());
        const fechaLlegada = new Date(row.querySelector('.fecha-salida').textContent.split(' - ')[1].trim());
        const precio = parseFloat(row.querySelector('.precio').textContent.trim()) || 0;
        const tieneEscalas = row.querySelector('td:nth-child(6)').textContent.trim() === 'Sí' ? 1 : 0;

        let matches = true;

        // Aplicar filtros
        if (filters.fechaIda) {
            const fechaIdaFiltro = new Date(filters.fechaIda);
            if (fechaSalida < fechaIdaFiltro) {
                matches = false;
            }
        }
        if (filters.fechaVuelta) {
            const fechaVueltaFiltro = new Date(filters.fechaVuelta);
            if (fechaLlegada > fechaVueltaFiltro) {
                matches = false;
            }
        }
        if (filters.precio && parseFloat(filters.precio) <= precio) {
            matches = false;
        }
        if (filters.aerolinea && filters.aerolinea !== aerolinea) {
            matches = false;
        }
        if (filters.escalas && parseInt(filters.escalas) !== tieneEscalas) {
            matches = false;
        }

        // Mostrar u ocultar filas
        row.style.display = matches ? '' : 'none';
    });
});


    resetButton.addEventListener('click', () => {
        form.reset(); // Restablece el formulario
        rows.forEach(row => {
            row.style.display = ''; // Muestra todas las filas
        });
    });

    // Inicializar Flatpickr
    flatpickr('#fecha-ida', { enableTime: true, dateFormat: 'Y-m-d H:i' });
    flatpickr('#fecha-vuelta', { enableTime: true, dateFormat: 'Y-m-d H:i' });
});

</script>

@endsection
