<?php

namespace App\Http\Controllers;

use App\Models\vuelos;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportesAdministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Filtrar los vuelos según los parámetros recibidos
        $query = vuelos::query();

        if ($request->has('origen') && $request->origen != '') {
            $query->where('origen', 'like', '%' . $request->origen . '%');
        }

        if ($request->has('destino') && $request->destino != '') {
            $query->where('destino', 'like', '%' . $request->destino . '%');
        }

        if ($request->has('fecha') && $request->fecha != '') {
            $query->whereDate('fecha_salida', '=', $request->fecha);
        }

        $vuelos = $query->get(); // Obtener los vuelos filtrados

        return view('reservasAdmi', compact('vuelos'));
    }

    // Método para generar el PDF
    public function generarPdf()
    {
        $vuelos = vuelos::all();
        $pdf = PDF::loadView('pdf.reporteVuelos', compact('vuelos'));
        return $pdf->download('reporte_vuelos.pdf');
    }
}
