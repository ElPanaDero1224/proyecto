<?php

namespace App\Http\Controllers;

use App\Models\vuelos_en_reservas_vuelos;
use Illuminate\Http\Request;
use App\Models\disponibilidad_asientos;
use Illuminate\Support\Facades\DB;

class VuelosEnReservasVuelosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Obtener la referencia de disponibilidad utilizando Query Builder
        $disponibilidad = DB::table('disponibilidad_asientos')->where('id', $id)->first();
    
        if (!$disponibilidad) {
            return back()->withErrors(['error' => 'Asiento no encontrado']);
        }
    
        $referencia = $disponibilidad->disponibilidadReferencia;
    
        // Obtener los datos del request
        $cantidad = $request->input('boletos');
        $vueloId = $request->input('vuelo_id');
    
        // Validar que la cantidad solicitada sea válida
        if ($cantidad <= 0) {
            return back()->withErrors(['error' => 'La cantidad de boletos debe ser mayor a cero.']);
        }
    
        // Verificar si hay suficiente disponibilidad
        if ($referencia < $cantidad) {
            return back()->withErrors(['error' => 'No hay suficientes boletos disponibles.']);
        }
    
        // Calcular nueva disponibilidad
        $nuevaDisponibilidad = $referencia - $cantidad;
    
        // Actualizar la disponibilidad en la base de datos
        DB::table('disponibilidad_asientos')
            ->where('id', $id)
            ->update(['disponibilidadReferencia' => $nuevaDisponibilidad]);
    
        // Crear una nueva reserva usando Query Builder
        DB::table('vuelos_en_reservas_vuelos')->insert([
            'vuelo_id' => $vueloId,
            'cantidadBoletos' => $cantidad,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Redirigir con mensaje de éxito
        return to_route('vuelosDestino')->with('success', 'Se ha hecho el registro correctamente.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(vuelos_en_reservas_vuelos $vuelos_en_reservas_vuelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vuelos_en_reservas_vuelos $request, $id)
    {
 
    }


    #funcion para mostrar el resumen antes de hacer todas las modificaciones
    public function form($id)
    {
        $consulta = disponibilidad_asientos::leftJoin('vuelos', 'disponibilidad_asientos.vuelo_id', '=', 'vuelos.id')
        ->join('aerolineas', 'vuelos.aerolinea_id', '=', 'aerolineas.id')
        ->join('precios', 'vuelos.precio_id', '=', 'precios.id')
        ->select(
            'aerolineas.nombre as aerolinea',
            'vuelos.numero_vuelo',
            'vuelos.fecha_salida',
            'vuelos.fecha_llegada',
            'vuelos.duracion',
            'precios.precio',
            'vuelos.escalas',
            'disponibilidad_asientos.disponibilidadReferencia',
            'disponibilidad_asientos.id as disponibilidad_id',
            'vuelos.id as vueloid',
        )
        ->where('disponibilidad_asientos.id', $id)
        ->first();  // Usando first() en lugar de get()
    

        return view('registrarVuelosEnReservaVuelos', compact('consulta'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vuelos_en_reservas_vuelos $vuelos_en_reservas_vuelos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vuelos_en_reservas_vuelos $vuelos_en_reservas_vuelos)
    {
        //
    }
}
