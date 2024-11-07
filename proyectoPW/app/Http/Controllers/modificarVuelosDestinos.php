<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\modificarVuelosDestinosValidaciones;

class modificarVuelosDestinos extends Controller
{
    public function modificarVueloDestino(){
        return view("modificarVuelosDestinos");
    }


    public function mdfcvls(modificarVuelosDestinosValidaciones $request){

        session()->flash('exito', 'El vuelo se ha actualizado');
        return to_route('modVuelDest');
    }

}
