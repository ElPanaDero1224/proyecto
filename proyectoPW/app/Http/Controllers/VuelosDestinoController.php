<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VuelosDestinoController extends Controller
{
    public function index()
    {
        $vuelos = [
            [
                'numero' => '123456',
                'aerolinea' => 'Aeromexico',
                'horario' => '11:30 am',
                'duracion' => 8,
                'precio' => 2333,
                'escalas' => '-'
            ],
            [
                'numero' => '789012',
                'aerolinea' => 'VivaAerobus',
                'horario' => '12:15 pm',
                'duracion' => 7,
                'precio' => 1234,
                'escalas' => '-'
                ],

            // Más datos de ejemplo pueden agregarse aquí
        ];

        return view('vuelosDestino', compact('vuelos'));
    }
}
