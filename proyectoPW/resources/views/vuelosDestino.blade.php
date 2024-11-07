@extends('layouts.plantillanavbarU') 
@section('modulo', '| Vuelos por destino')
@section('seccion')


<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="ordenarFecha" class="form-label">Ordenar por fecha:</label>
            <select id="ordenarFecha" class="form-select">
                <option value="asc">Menor a mayor</option>
                <option value="desc">Mayor a menor</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="ordenarDuracion" class="form-label">Ordenar duración:</label>
            <select id="ordenarDuracion" class="form-select">
                <option value="asc">Menor a mayor</option>
                <option value="desc">Mayor a menor</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="ordenarHorario" class="form-label">Ordenar Horario:</label>
            <select id="ordenarHorario" class="form-select">
                <option value="am">Antes de mediodía</option>
                <option value="pm">Después de mediodía</option>
            </select>
        </div>
    </div>

    <table class="table table-bordered" id="tablaVuelos">
        <thead class="table-success">
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
            @foreach ($vuelos as $vuelo)
                <tr onclick="window.location.href='{{ route('rutadetallesVuelo', ['numero' => $vuelo['numero']]) }}'" style="cursor: pointer;">
                    <td>{{ $vuelo['numero'] }}</td>
                    <td>{{ $vuelo['aerolinea'] }}</td>
                    <td>{{ $vuelo['horario'] }}</td>
                    <td data-duracion="{{ $vuelo['duracion'] }}">{{ $vuelo['duracion'] }}</td>
                    <td data-precio="{{ $vuelo['precio'] }}">${{ $vuelo['precio'] }}</td>
                    <td>{{ $vuelo['escalas'] }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ordenarFecha = document.getElementById('ordenarFecha');
        const ordenarDuracion = document.getElementById('ordenarDuracion');
        const ordenarHorario = document.getElementById('ordenarHorario');
        const tabla = document.getElementById('tablaVuelos').getElementsByTagName('tbody')[0];

        function ordenarTabla(colIndex, dataAttr, order) {
            const filas = Array.from(tabla.rows);
            filas.sort((a, b) => {
                const aVal = parseInt(a.cells[colIndex].getAttribute(dataAttr));
                const bVal = parseInt(b.cells[colIndex].getAttribute(dataAttr));
                return (order === 'asc' ? aVal - bVal : bVal - aVal);
            });
            filas.forEach(fila => tabla.appendChild(fila));
        }

        ordenarFecha.addEventListener('change', function() {
            ordenarTabla(4, 'data-precio', this.value); // Columna 4 (Precio)
        });

        ordenarDuracion.addEventListener('change', function() {
            ordenarTabla(3, 'data-duracion', this.value); // Columna 3 (Duración del vuelo)
        });

        ordenarHorario.addEventListener('change', function() {
            const filas = Array.from(tabla.rows);
            filas.sort((a, b) => {
                const aHora = a.cells[2].textContent.includes('am') ? 0 : 1;
                const bHora = b.cells[2].textContent.includes('am') ? 0 : 1;
                return (ordenarHorario.value === 'am' ? aHora - bHora : bHora - aHora);
            });
            filas.forEach(fila => tabla.appendChild(fila));
        });
    });
</script>

@endsection
