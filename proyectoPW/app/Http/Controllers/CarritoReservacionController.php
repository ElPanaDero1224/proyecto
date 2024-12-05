<?php

namespace App\Http\Controllers;

use App\Models\carrito_reservacion;
use App\Models\vuelos_en_reservas_vuelos;
use App\Models\reserva_hoteles;
use Illuminate\Http\Request;
use App\Models\reserva_hoteles_tiene_hoteles;
USE Illuminate\Support\Facades\DB;

class CarritoReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Consulta para obtener los detalles de los vuelos
    $carritoVuelos = carrito_reservacion::leftJoin('vuelos_en_reservas_vuelos', 'carrito_reservacion.vuelos_en_reservas_vuelos_id', '=', 'vuelos_en_reservas_vuelos.id')
        ->leftJoin('vuelos', 'vuelos_en_reservas_vuelos.vuelo_id', '=', 'vuelos.id')
        ->select(
            'carrito_reservacion.id',
            'carrito_reservacion.precio_total_carrito',
            'carrito_reservacion.usuario_id',
            'vuelos.numero_vuelo',
            'vuelos.origen',
            'vuelos.destino',
            'vuelos.fecha_salida',
            'vuelos.fecha_llegada',
            'vuelos.duracion',
            'vuelos.escalas'
        )
        ->get();
 
    // Consulta para obtener los detalles de las reservas de hoteles
    $carritoHoteles = carrito_reservacion::leftJoin('reserva_hoteles', 'carrito_reservacion.reserva_hotel_id', '=', 'reserva_hoteles.id')
        ->leftJoin('reserva_hoteles_tiene_hoteles', 'reserva_hoteles.id', '=', 'reserva_hoteles_tiene_hoteles.reserva_hotel_id')
        ->leftJoin('hotels', 'reserva_hoteles_tiene_hoteles.hotel_id', '=', 'hotels.id')
        ->select(
            'carrito_reservacion.id',
            'carrito_reservacion.precio_total_carrito',
            'carrito_reservacion.usuario_id',
            'hotels.nombre as hotel_nombre',
            'reserva_hoteles.fecha_check_in',
            'reserva_hoteles.fecha_check_out',
            'reserva_hoteles.precio_total'
        )
        ->get();

        
        $modalVuelos = vuelos_en_reservas_vuelos::leftJoin('vuelos', 'vuelos_en_reservas_vuelos.vuelo_id', '=', 'vuelos.id')
        ->leftJoin('precios', 'vuelos.precio_id', '=', 'precios.id') // Join con la tabla de precios
        ->select(
            'vuelos_en_reservas_vuelos.id',
            'vuelos.numero_vuelo',
            'vuelos.origen',
            'vuelos.destino',
            'vuelos.fecha_salida',
            'vuelos.fecha_llegada',
            'precios.precio as precio' 
        )
        ->get();
    
    $modalHoteles = DB::table('reserva_hoteles_tiene_hoteles')
    ->leftJoin('hotels', 'reserva_hoteles_tiene_hoteles.hotel_id', '=', 'hotels.id')
    ->leftJoin('reserva_hoteles', 'reserva_hoteles_tiene_hoteles.reserva_hotel_id', '=', 'reserva_hoteles.id')
    ->select(
        'hotels.id as id',
        'hotels.nombre as hotel_nombre',
        'reserva_hoteles.id as reserva_id',
        'reserva_hoteles.precio_total as precio_reserva',
        'reserva_hoteles.fecha_check_in',
        'reserva_hoteles.fecha_check_out'
    )
    ->get();

    // Sumar los totales de vuelos y hoteles
    foreach ($carritoVuelos as $reservacionVuelo) {
        foreach ($carritoHoteles as $reservacionHotel) {
            // Asumimos que la relación entre vuelo y hotel se hace por ID de carrito_reservacion
            if ($reservacionVuelo->id === $reservacionHotel->id) {
                $reservacionVuelo->total_con_hotel = $reservacionVuelo->precio_total_carrito + $reservacionHotel->precio_total;
            }
        }
    }

    // Pasar ambas colecciones a la vista
    return view('carrito', compact('carritoVuelos', 'carritoHoteles', 'modalVuelos', 'modalHoteles'));
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $addCarrito = new carrito_reservacion();

    $addCarrito->precio_total_carrito = $request->precio_total_carrito;
    $addCarrito->usuario_id = $request->usuario_id;
    $addCarrito->reserva_hotel_id = $request->reserva_hotel_id;
    $addCarrito->vuelos_en_reservas_vuelos_id = $request->vuelos_en_reservas_vuelos_id;
    $addCarrito->save();

    return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(carrito_reservacion $carrito_reservacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(carrito_reservacion $carrito_reservacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, carrito_reservacion $carrito_reservacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(carrito_reservacion $carrito_reservacion)
    {
        //
    }
}
