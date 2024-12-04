<?php

namespace App\Http\Controllers;

use App\Models\aerolineas;
use Illuminate\Http\Request;

class AerolineasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consulta = aerolineas::all();
        return view("verAerolineasAdmin", compact("consulta"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("registroNewAerolineaAdmin");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'aerolinea' => 'required|string|max:255|unique:aerolineas,nombre',
        ], [
            // Mensajes personalizados
            'aerolinea.required' => 'El nombre de la aerolínea es obligatorio.',
            'aerolinea.string' => 'El nombre de la aerolínea debe ser un texto válido.',
            'aerolinea.max' => 'El nombre de la aerolínea no puede exceder los 255 caracteres.',
            'aerolinea.unique' => 'La aerolínea ya existe en el sistema.',
        ]);
        
        $addAerolinea = new aerolineas();
        $addAerolinea->nombre = $request->input("aerolinea");

        $addAerolinea->save();

        $nombre = $request->input("aerolinea");
        return to_route('aerolineas.index')->with('success', 'La aerolinea '.$nombre. ' se ha agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(aerolineas $aerolineas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aerolineas $request, $id)
    {
        $ar = aerolineas::find($id);
        return view("modificarAerolinea", compact("ar"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'aerolinea' => 'required|string|max:255|unique:aerolineas,nombre',
        ], [
            // Mensajes personalizados
            'aerolinea.required' => 'El nombre de la aerolínea es obligatorio.',
            'aerolinea.string' => 'El nombre de la aerolínea debe ser un texto válido.',
            'aerolinea.max' => 'El nombre de la aerolínea no puede exceder los 255 caracteres.',
            'aerolinea.unique' => 'La aerolínea ya existe en el sistema.',
        ]);

        $upAerolinea = aerolineas::find($id);
        $upAerolinea->nombre = $request->input("aerolinea");
        $upAerolinea->update();

        return to_route("aerolineas.index")->with('success', 'La aerolinea se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aerolineas $request, $id)
    {
        $aerolinea = Aerolineas::find($id);

        
        if ($aerolinea) {
            $nombre = $aerolinea->nombre; 
            $aerolinea->delete(); 

            session()->flash('success', 'La aerolínea ' . $nombre . ' se ha eliminado.');
        } else {
 
            session()->flash('error', 'La aerolínea con ID ' . $id . ' no existe.');
        }

        return to_route('aerolineas.index');


    }
}
