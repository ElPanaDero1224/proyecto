<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorreservasAdmi extends Controller
{
    public function reservasAdmi(){
    return view('reservasAdmi');
    }

    public function controladorreservasAdmialert(Request $peticion){ 

        $tipoexportar=$peticion->input('tipoexportar');
       session()->flash('exito', 'Se ha exportado correctamente el archivo en formato '.$tipoexportar);
        return to_route('rutareservasAdmi');
        }

}

