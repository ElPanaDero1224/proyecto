<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Vuelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ADD8E6;
            font-weight: bold;
        }
        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Reporte de Vuelos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha de Salida</th>
                <th>Hora de Salida</th>
                <th>Fecha de Llegada</th>
                <th>Hora de Llegada</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vuelos as $vuelo)
                <tr>
                    <td>{{ $vuelo->id }}</td>
                    <td>{{ $vuelo->origen }}</td>
                    <td>{{ $vuelo->destino }}</td>
                    <td>{{ $vuelo->fecha_salida }}</td>
                    <td>{{ $vuelo->hora_salida }}</td>
                    <td>{{ $vuelo->fecha_llegada }}</td>
                    <td>{{ $vuelo->hora_llegada }}</td>
                    <td>${{ number_format($vuelo->precio, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
