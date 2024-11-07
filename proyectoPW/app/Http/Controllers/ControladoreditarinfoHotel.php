<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorhotelesAdmiEdit;

class ControladoreditarinfoHotel extends Controller
{
    public function editarinfoHotel(){
        return view('editarinfoHotel');
    }
    public function procesarEditarHotel(validadorhotelesAdmiEdit $peticion){
        $hotel = $peticion->input('titulo');
        session()->flash('editarhotel','Se ha editado el hotel '.$hotel);
        return to_route('rutaeditarHotel');
    }
}
