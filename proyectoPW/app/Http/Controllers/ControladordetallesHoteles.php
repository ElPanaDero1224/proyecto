<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladordetallesHoteles extends Controller
{
    public function detallesHoteles(){
        return view('detallesHoteles');
    }
}
