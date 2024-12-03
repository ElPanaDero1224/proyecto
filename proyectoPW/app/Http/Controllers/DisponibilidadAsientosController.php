<?php

namespace App\Http\Controllers;

use App\Models\disponibilidad_asientos;
use App\Models\vuelos;
use Illuminate\Http\Request;

class DisponibilidadAsientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asientos = disponibilidad_asientos::join('vuelos', 'disponibilidad_asientos.vuelo_id', '=', 'vuelos.id')
        ->select(
            'disponibilidad_asientos.id as asiento_id', 
            'disponibilidad_asientos.tipo_asiento', 
            'disponibilidad_asientos.disponibilidad_total', 
            'disponibilidad_asientos.disponibilidadReferencia', 
            'vuelos.id as vuelo_id', 
            'vuelos.numero_vuelo'
        )
        ->get();
        return view('disponibilidadAsientosAdmin', compact('asientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vuelos = vuelos::all();
        return view('registroNewDisponibilidadAsientosAdmin', compact('vuelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $disponibilidad = new disponibilidad_asientos();

        $disponibilidad->tipo_asiento = $request->input('asiento');
        $disponibilidad->disponibilidad_total = $request->input('disponibilidad');
        $disponibilidad->disponibilidadReferencia = $request->input('disponibilidad');
        $disponibilidad->vuelo_id = $request->input('vuelo'); // Relación con el vuelo
        $disponibilidad->save();
    
        return to_route('disponibilidad_asientos.index')->with('success', 'La disponibilidad de asientos se ha agregado');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(disponibilidad_asientos $disponibilidad_asientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(disponibilidad_asientos $request, $id)
    {
        $vuelos = vuelos::all();
        $disponibilidad = disponibilidad_asientos::find($id);
        return view('modificarDisponibilidadAsientosAdmin', compact('vuelos', 'disponibilidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $disponibilidad_asientos = disponibilidad_asientos::find($id);
        $disponibilidad_asientos->tipo_asiento = $request->input('asiento');
        $disponibilidad_asientos->disponibilidad_total = $request->input('disponibilidad');
        $disponibilidad_asientos->disponibilidadReferencia = $request->input('disponibilidad');
        $disponibilidad_asientos->vuelo_id = $request->input('vuelo'); 
        $disponibilidad_asientos->update();


        return to_route('disponibilidad_asientos.index')->with('success', 'La disponibilidad de asientos se ha actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(disponibilidad_asientos $request, $id)
    {
        $disponibilidad_asientos = disponibilidad_asientos::find($id);

        if ($disponibilidad_asientos) {
            $nombre = $disponibilidad_asientos->tipo_asiento; 
            $disponibilidad_asientos->delete(); 

            session()->flash('success', 'Los asientos de tipo ' . $nombre . ' se han eliminado.');
        } else {
 
            session()->flash('error', 'Los asientos con ID ' . $id . ' no existen.');
        }

        return to_route('disponibilidad_asientos.index');

    }
}
