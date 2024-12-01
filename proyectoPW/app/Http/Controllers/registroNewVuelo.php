<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\registroNewVueloValidaciones;

class registroNewVuelo extends Controller
{
    public function registroNewVuelo(){
        return view("registroNewVuelo");
    }


    public function registroVuelo(registroNewVueloValidaciones $request){

        session()->flash('exito', 'El vuelo se ha registrado');
        return to_route('registroNewVuelo');
}

}

