<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPoliticasCancelacion extends Controller
{
    public function politicasCancelacion(){
        return view('politicasCancelacion');
    }
}