<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function busquedaHoteles()
    {
        return view('busquedaHoteles');
    }

    public function detallesHoteles()
    {
        return view('detallesHoteles');
    }
}
