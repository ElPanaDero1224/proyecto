<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\recuperacionContraseñaValidador;


class recuperacionContraseña extends Controller
{
    public function recuperacionContraseña(){
        return view('recuperacionContraseña');
    }

    public function recuperar(recuperacionContraseñaValidador $request){
        $em = $request->input('email');
        session()->flash('exito', 'Se ha enviado un correo a '.$em);   
        return to_route('recuperacionContraseña');

        }


}
