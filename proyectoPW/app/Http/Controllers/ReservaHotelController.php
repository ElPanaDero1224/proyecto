<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reserva_hoteles; // Modelo con minúsculas
use App\Models\reserva_hoteles_tiene_hoteles; // Modelo con minúsculas
use App\Models\hotels;

class ReservaHotelController extends Controller
{
    public function reservar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha_check_in' => 'required|date|after_or_equal:today',
            'fecha_check_out' => 'required|date|after:fecha_check_in',
            'cantidad' => 'required|integer|min:1',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        // Obtener el hotel y calcular el precio total
        $hotel = hotels::findOrFail($request->hotel_id);
        $precioTotal = $hotel->precio_por_noche * $request->cantidad;

        // Crear la reserva usando el modelo `reserva_hoteles`
        $reserva = new reserva_hoteles(); // Utilizando el modelo correcto con minúsculas
        $reserva->fecha_check_in = $request->fecha_check_in;
        $reserva->fecha_check_out = $request->fecha_check_out;
        $reserva->precio_total = $precioTotal;
        $reserva->save();

        // Crear la relación en `reserva_hoteles_tiene_hoteles` usando su modelo
        $reservaDetalle = new reserva_hoteles_tiene_hoteles(); // Utilizando el modelo correcto con minúsculas
        $reservaDetalle->cantidad = $request->cantidad;
        $reservaDetalle->reserva_hotel_id = $reserva->id; // FK a `reserva_hoteles`
        $reservaDetalle->hotel_id = $hotel->id;           // FK a `hotels`
        $reservaDetalle->save();

        // Redireccionar con mensaje de éxito
        return redirect()->back()->with('ReservarCompra', 'Reservación realizada exitosamente.');
    }
}
