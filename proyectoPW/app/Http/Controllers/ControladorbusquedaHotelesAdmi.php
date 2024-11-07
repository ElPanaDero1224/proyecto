<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidadorbusqedahotelesAfmi;

class ControladorbusquedaHotelesAdmi extends Controller

{
    public function busquedahotelesAdmi(){
        return view('busquedahotelesAdmi');
    }
    public function procesarbusquedahotelesAdmi(ValidadorbusqedahotelesAfmi $peticion){
        $destino = $peticion->input('destino');
        session()->flash('buscarhoteladmi','Se ha realizado la busqueda de hoteles en '.$destino);
        return to_route('rutabusquedaHotelesAdmi');

    }
}