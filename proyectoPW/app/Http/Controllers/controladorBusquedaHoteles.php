<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;

class controladorBusquedaHoteles extends Controller
{
    public function busquedahoteles(Request $request)
    {
        // Construir la consulta base
        $query = Hotels::with('fotografias');

        // Aplicar filtros dinámicamente
        if ($request->has('destino') && $request->input('destino')) {
            $query->where('ubicacion', 'like', '%' . $request->input('destino') . '%');
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

        // Puedes aplicar más filtros si es necesario

        // Obtener los resultados filtrados
        $consulta = $query->get();

        // Retornar la vista con los resultados
        return view('busquedaHoteles', compact('consulta'));
    }
}
