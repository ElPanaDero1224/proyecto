<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hotels;


class ControladordetallesHoteles extends Controller
{
    public function detallesHoteles($id)
    {
        // Buscar el hotel por ID con sus fotografías y comentarios relacionados
        $hotel = hotels::with(['fotografias', 'comentarios.usuario'])->findOrFail($id);

        // Pasar los datos del hotel, fotografías y comentarios a la vista
        return view('detallesHoteles', compact('hotel'));
    }
    public function politicasCancelacion($id)
{
    // Buscar el hotel por ID
    $hotel = hotels::findOrFail($id);

    // Pasar las políticas a la vista
    return view('politicasCancelacion', compact('hotel'));
}

}
