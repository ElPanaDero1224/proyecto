<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusquedaVuelosRequest;
use Illuminate\Http\Request;

class BusquedaVuelosController extends Controller
{
    public function index()
    {
        return view('busquedaVuelos');
    }

    public function store(BusquedaVuelosRequest $request)
    {
        return redirect()->route('rutavuelosDestino');
    }

    public function destino()
    {
    return view('vuelosDestino');
    }

}

