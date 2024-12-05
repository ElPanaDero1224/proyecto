<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Destinos;  // Agregar el modelo de destinos

class ControladorBusquedaHoteles extends Controller
{
    public function busquedahoteles(Request $request)
    {
        // Obtener todos los destinos disponibles
        $destinos = Destinos::all();

        // Construir la consulta base
        $query = Hotels::with(['fotografias', 'destino']);

        // Aplicar filtros dinámicamente
        if ($request->has('destino') && $request->input('destino')) {
            $query->where('destino_id', '=', $request->input('destino'));
        }

        if ($request->has('categoria') && $request->input('categoria')) {
            $query->where('categoria', '=', $request->input('categoria'));
        }

        if ($request->has('precio_max') && $request->input('precio_max')) {
            $query->where('precio_por_noche', '<=', $request->input('precio_max'));
        }

        if ($request->has('distancia_max') && $request->input('distancia_max')) {
            $query->where('distancia_centro', '<=', $request->input('distancia_max'));
        }

        // Filtro por número de habitaciones (capacidad)
        if ($request->has('habitaciones') && $request->input('habitaciones')) {
            $query->where('capacidad', '=', $request->input('habitaciones'));
        }
        // Obtener los resultados filtrados
        $consulta = $query->get();

        // Retornar la vista con los resultados y los destinos
        return view('busquedaHoteles', compact('consulta', 'destinos'));
    }
}

