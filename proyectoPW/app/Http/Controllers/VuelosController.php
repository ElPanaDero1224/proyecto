<?php

namespace App\Http\Controllers;

use App\Models\vuelos;
use Illuminate\Http\Request;

use App\Models\precios;
use App\Models\aerolineas;



class VuelosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consulta = vuelos::all();
        return view("busquedaVuelosAdmi", compact('consulta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar = aerolineas::all();
        $pre = precios::all();

        return view("registroNewVuelo", compact("ar", "pre"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        // Crear una nueva instancia de Vuelo
        $addVuelo = new vuelos();
    
        $addVuelo->numero_vuelo = $request->input('numeroVuelo');
        $addVuelo->origen = $request->input('origen');
        $addVuelo->destino = $request->input('destino');
        $addVuelo->fecha_salida = $request->input('fechaSalida');
        $addVuelo->fecha_llegada = $request->input('fechaLlegada');
        $addVuelo->duracion = $request->input('duracion');
        $addVuelo->escalas = $request->input('escalas');
        $addVuelo->aerolinea_id = $request->input('aerolinea');
        $addVuelo->precio_id = $request->input('precio');
    
        // Guardar el vuelo en la base de datos
        $addVuelo->save();
    
        // Redirigir a la lista de vuelos con un mensaje de éxito
        return to_route('vuelos.index')->with('success', 'El vuelo ' . $addVuelo->numero_vuelo . ' ha sido creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(vuelos $vuelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vuelos $request, $id)
    {
        $ar = aerolineas::all();
        $pre = precios::all();
        $vuelos = vuelos::find($id);

        return view('modificarVuelosDestinos', compact('ar','pre','vuelos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $vuelo = vuelos::find($id);

        // Actualizar los campos del vuelo con los datos del formulario
        $vuelo->numero_vuelo = $request->input('numeroVuelo');
        $vuelo->origen = $request->input('origen');
        $vuelo->destino = $request->input('destino');
        $vuelo->fecha_salida = $request->input('fechaSalida');
        $vuelo->fecha_llegada = $request->input('fechaLlegada');
        $vuelo->duracion = $request->input('duracion');
        $vuelo->escalas = $request->input('escalas');
        $vuelo->aerolinea_id = $request->input('aerolinea');
        $vuelo->precio_id = $request->input('precio');
    
        // Guardar los cambios en la base de datos
// Guardar los cambios en la base de datos
        $vuelo->update();

        // Redirigir a la lista de vuelos con un mensaje de éxito
        return to_route('vuelos.index')->with('success', 'El vuelo ' . $vuelo->numero_vuelo . ' ha sido actualizado exitosamente.');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vuelos $request, $id)
    {
    
        $vuelo = vuelos::find($id);

        if ($vuelo) {
            $numero = $vuelo->numero_vuelo;
            $vuelo->delete();

            session()->flash('success', 'El vuelo ' . $numero . ' se ha eliminado.');
        } else {
            session()->flash('error', 'El vuelo con ID ' . $id . ' no existe.');
        }

        // Redirigir a la lista de vuelos
        return to_route('vuelos.index');

    }
}
