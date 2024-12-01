<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladornotificacionesPlantillas extends Controller
{
    public function notificacionesPlantillas(){
        return view('notificacionesPlantillas');
        }

    public function confirmacionregistro(Request $peticion){ 

        $confirmacion= 'confirmacion registro';
       session()->flash('exito', 'Se ha actualizado tu registro de:'.$confirmacion);
        return to_route('rutaplantillas');
        }

    public function hotel(Request $peticion){ 

        $hotel= 'Hotel';
       session()->flash('exito', 'Se ha actualizado tu registro de:'.$hotel);
        return to_route('rutaplantillas');
        }

    public function vuelo(Request $peticion){ 

        $vuelo= 'Vuelo';
       session()->flash('exito', 'Se ha actualizado tu registro de:'.$vuelo);
        return to_route('rutaplantillas');
        }

    public function cancelacion(Request $peticion){ 

        $cancelacion= 'Cancelacion';
       session()->flash('exito', 'Se ha actualizado tu registro de:'.$cancelacion);
        return to_route('rutaplantillas');
        }
        
    public function retraso(Request $peticion){ 

        $retraso= 'Retraso';
       session()->flash('exito', 'Se ha actualizado tu registro de:'.$retraso);
        return to_route('rutaplantillas');
        }

    
    
} 
