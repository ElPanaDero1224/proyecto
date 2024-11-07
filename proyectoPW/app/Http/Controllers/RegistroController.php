<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro');
    }

    public function store(RegistroRequest $request)
    {
        return redirect()->route('rutabusquedaVuelos');
    }
}

