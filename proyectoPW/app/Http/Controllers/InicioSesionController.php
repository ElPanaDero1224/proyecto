<?php

namespace App\Http\Controllers;

use App\Http\Requests\InicioSesionRequest;
use Illuminate\Http\Request;

class InicioSesionController extends Controller
{
    /**
     * Muestra la vista de inicio de sesión.
     */
    public function create()
    {
        return view('inicioSesion');
    }

    /**
     * Procesa el formulario de inicio de sesión con validaciones.
     */
    public function store(InicioSesionRequest $request)
    {
        // Si pasa las validaciones del InicioSesionRequest
        return redirect()->route('rutabusquedaVuelos')->with('exito', 'Inicio de sesión exitoso.');
    }
}
