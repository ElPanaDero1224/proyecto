<?php

namespace App\Http\Controllers;

use App\Models\hotels;
use Illuminate\Http\Request;
use App\Http\Requests\HotelRequest;
use App\Models\fotografias;
use App\Models\habitacionesController;
use App\Models\destinos;


class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $consulta = Hotels::with('fotografias', 'destino')->get();
    return view('busquedaHotelesAdmi', compact('consulta'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $destinos = destinos::all(); // Obtiene todos los registros de destinos
    return view('agregarinfoHotel', compact('destinos')); // Pasa los destinos a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelRequest $request)
    {
    // Crear el hotel
    $addHotel = new Hotels();

    $addHotel->nombre = $request->input('nombre');
    $addHotel->ubicacion = $request->input('ubicacion');
    $addHotel->categoria = $request->input('categoria');
    $addHotel->descripcion = $request->input('descripcion');
    $addHotel->servicios = $request->input('servicios');
    $addHotel->distancia_puntos_turisticos = $request->input('distancia_puntos_turisticos');
    $addHotel->distancia_centro = $request->input('distancia_centro');
    $addHotel->politicas_cancelacion = $request->input('politicas_cancelacion');
    $addHotel->capacidad = $request->input('capacidad');
    $addHotel->precio_por_noche = $request->input('precio_por_noche');
    $addHotel->destino_id = $request->input('destino_id');

    $addHotel->save();

    // Subir y guardar fotografías
    if ($request->hasFile('fotografias')) {
        foreach ($request->file('fotografias') as $file) {
            $path = $file->store('fotografias', 'public');
            
            fotografias::create([
                'nombre' => $file->getClientOriginalName(),
                'url_imagen' => $path,
                'descripcion' => '', // Puedes agregar un campo de descripción si es necesario
                'hotel_id' => $addHotel->id,
            ]);
        }
    }

    // Flash message y redirección
    $hotel = $request->input('nombre');
    session()->flash('guardarhotel', 'Se guardó correctamente el Hotel: ' . $hotel);
    return to_route('hotels.index');
}


    /**
     * Display the specified resource.
     */
    public function show(hotels $hotels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotels $hotel)
    {
        // Obtén todos los destinos disponibles
        $destinos = Destinos::all(); 

        // Retorna la vista de edición con el hotel y los destinos disponibles
        return view('editarinfoHotel', compact('hotel', 'destinos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HotelRequest $request, $id)
    {
        //
        $upHotels = hotels::find($id);
        $upHotels->nombre = $request->input('nombre');
        $upHotels->ubicacion = $request->input('ubicacion');
        $upHotels->categoria = $request->input('categoria');
        $upHotels->descripcion = $request->input('descripcion');
        $upHotels->servicios = $request->input('servicios');
        $upHotels->distancia_puntos_turisticos = $request->input('distancia_puntos_turisticos');
        $upHotels->distancia_centro = $request->input('distancia_centro');
        $upHotels->politicas_cancelacion = $request->input('politicas_cancelacion');
        $upHotels->capacidad = $request->input('capacidad');
        $upHotels->precio_por_noche = $request->input('precio_por_noche');
        $upHotels->destino_id = $request->input('destino_id');

        $upHotels->update();

        $hotel = $request->input('nombre');
        session()->flash('editarhotel','Se editó correctamente el Hotel : '.$hotel);
        return to_route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hotels $hotel)
    {

        $hotelName = $hotel->nombre;  
        $hotel->delete();
        session()->flash('eliminarhotel', 'Se eliminó correctamente el Hotel: ' . $hotelName);
        return redirect()->route('hotels.index');
    }

}
