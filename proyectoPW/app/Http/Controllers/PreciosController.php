<?php

namespace App\Http\Controllers;

use App\Models\precios;
use Illuminate\Http\Request;

class PreciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consulta = precios::all();
        return view("verPreciosAdmin", compact("consulta"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("registroNewPrecioAdmin");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombreClase' => 'required|string|max:80|unique:precios,clase',
            'precioClase' => 'required|numeric|min:0',
        ], [
            // Mensajes personalizados
            'nombreClase.required' => 'El nombre de la clase es obligatorio.',
            'nombreClase.string' => 'El nombre de la clase debe ser un texto válido.',
            'nombreClase.max' => 'El nombre de la clase no puede exceder los 80 caracteres.',
            'nombreClase.unique' => 'La clase ya existe en el sistema.',
            'precioClase.required' => 'El precio de la clase es obligatorio.',
            'precioClase.numeric' => 'El precio debe ser un número válido.',
            'precioClase.min' => 'El precio no puede ser negativo.',
        ]);

        $addPrecio = new precios();
    
        // Asignar los valores correctamente
        $addPrecio->clase = $request->input("nombreClase");
        $addPrecio->precio = $request->input("precioClase"); // Cambiar a 'precio'
    
        $addPrecio->save();
    
        $nombre = $request->input("nombreClase");
        return to_route('precios.index')->with('success', 'La clase ' . $nombre . ' se ha agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(precios $precios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(precios $request, $id)
    {
        $precio = precios::find($id);
        return view('modificarPrecios', compact('precio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombreClase' => 'required|string|max:80|unique:precios,clase',
            'precioClase' => 'required|numeric|min:0',
        ], [
            // Mensajes personalizados
            'nombreClase.required' => 'El nombre de la clase es obligatorio.',
            'nombreClase.string' => 'El nombre de la clase debe ser un texto válido.',
            'nombreClase.max' => 'El nombre de la clase no puede exceder los 80 caracteres.',
            'nombreClase.unique' => 'La clase ya existe en el sistema.',
            'precioClase.required' => 'El precio de la clase es obligatorio.',
            'precioClase.numeric' => 'El precio debe ser un número válido.',
            'precioClase.min' => 'El precio no puede ser negativo.',
        ]);
        

        $upPrecio = precios::find($id);
        $upPrecio->clase = $request->input("nombreClase");
        $upPrecio->precio = $request->input("precioClase");
        $upPrecio->update();

        return to_route("precios.index")->with('success', 'La clase se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(precios $request, $id)
    {
        $precio = precios::find($id);

        
        if ($precio) {
            $nombre = $precio->clase; 
            $precio->delete(); 

            session()->flash('success', 'La clase ' . $nombre . ' se ha eliminado.');
        } else {
 
            session()->flash('error', 'La clase con ID ' . $id . ' no existe.');
        }

        return to_route('precios.index');
        
    }
}
