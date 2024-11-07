<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetallesVueloController extends Controller
{
    public function show($numero)
    {
        $vuelos = [
            '123456' => [
                'numero' => '123456',
                'aerolinea' => 'Aeromexico',
                'horario' => '08:15 am - 11:30 am',
                'duracion' => '8 horas',
                'precio' => 2333,
                'escalas' => '-',
                'asientos_disponibles' => 8,
            ],
            '789012' => [
                'numero' => '789012',
                'aerolinea' => 'VivaAerobus',
                'horario' => '12:15 pm - 7:15 pm',
                'duracion' => '7 horas',
                'precio' => 1234,
                'escalas' => '-',
                'asientos_disponibles' => 5,
            ],
            // Agrega más vuelos según sea necesario
        ];

        // Verificar si el vuelo existe en los datos
        $vuelo = $vuelos[$numero] ?? null;

        if (!$vuelo) {
            abort(404, 'Vuelo no encontrado.');
        }

        return view('detallesVuelo', compact('vuelo'));
    }
}

