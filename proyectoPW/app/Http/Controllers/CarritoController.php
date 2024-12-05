<?php

namespace App\Http\Controllers;

use App\Models\vuelos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
       //
    }

    public function consultaviaje()
    {

        
        return view('carrito');
    }

    public function consultahotel()
    {
        return view('carrito');
    }

    public function procesarpago()
    {
        return view('carrito');
    }
}
