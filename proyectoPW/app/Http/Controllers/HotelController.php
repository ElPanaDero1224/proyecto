<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HotelController extends Controller
{
    public function create(): View
    {
        return view('formularioNewHotel');
    }

    public function store(HotelRequest $request): RedirectResponse
    {
        $hotelNombre = $request->input('titulo');
        session()->flash('exito', 'Se guardó el hotel: ' . $hotelNombre);
        return redirect()->route('hotelesAdminformulario.create');
    }
}


