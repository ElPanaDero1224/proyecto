<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comentarios;
;
class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
        comentarios::create([
            'fecha' => now(),
            'hotel_id' => $request->hotel_id, // ID del hotel relacionado
            'usuario_id' =>1, // ID del usuario autenticado
            'puntuacion' => $request->puntuacion,
            'comentario' => $request->comentario,
            
        ]);
        
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('comentarioagregado', 'Comentario añadido exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Buscar el comentario
        $comentario = comentarios::findOrFail($id);

        // Verificar que el usuario sea el propietario
        if ($comentario->usuario_id !== 1) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar este comentario.');
        }

        // Eliminar el comentario
        $comentario->delete();

        return redirect()->back()->with('eliminarcomentario', 'Comentario eliminado correctamente.');

    }
}
