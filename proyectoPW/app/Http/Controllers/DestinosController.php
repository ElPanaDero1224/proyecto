<?php

namespace App\Http\Controllers;

use App\Models\Destinos;
use Illuminate\Http\Request;

class DestinosController extends Controller
{
    /**
     * Display a listing of the resource.
     * **/
    public function index()
    {
        // Obtener todos los destinos de la base de datos
        $destinos = Destinos::all();

        // Pasar los destinos a la vista
        return view('destinos', compact('destinos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('agregardestinos');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Crear el hotel
   // Validación de los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    // Crear el nuevo destino
    $destino = new Destinos();
    $destino->nombre = $request->input('nombre');
    $destino->save();

    // Redirigir a la lista de destinos o mostrar un mensaje de éxito
    return redirect()->route('destinos.index')->with('success', 'Destino agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destinos $destinos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destinos $destino)
    {
        // Retornar la vista con el destino a editar
        return view('editardestino', compact('destino'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    // Actualizar el destino
    $upDestino = Destinos::find($id);
    $upDestino->nombre = $request->nombre;
    $upDestino->update();

    // Redirigir al usuario después de guardar
    return redirect()->route('destinos.index')->with('success', 'Destino actualizado correctamente');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destino = Destinos::find($id);
        
        if ($destino) {
            $destino->delete();
            return redirect()->route('destinos.index')->with('eliminardestino', 'Destino eliminado exitosamente');
        } else {
            return redirect()->route('destinos.index')->with('error', 'Destino no encontrado');
        }
    }
    
}
