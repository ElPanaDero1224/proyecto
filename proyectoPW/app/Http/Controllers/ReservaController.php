<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Muestra la vista de reservas.
     */
    public function index()
    {
        return view('reservas');
    }
}

