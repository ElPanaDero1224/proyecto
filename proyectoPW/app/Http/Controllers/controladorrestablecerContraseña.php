<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorrestablecerContraseña;

class controladorrestablecerContraseña extends Controller
{
    public function restablecerContraseña(){
        return view('restablecerContraseña');
        }

    
    public function Alert(validadorrestablecerContraseña $peticion){ 

        $contraseña=$peticion->input('contraseña');
        session()->flash('exito', 'La contraseña fue cambiada'.$contraseña);
        return to_route('rutarestablecerpass');
        }
    
}
