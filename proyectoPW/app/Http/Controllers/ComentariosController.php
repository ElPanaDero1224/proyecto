<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comentarios;
use Illuminate\Support\Facades\Auth; // Importar el facade Auth

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
        // Validar los datos recibidos
        $request->validate([
            'hotel_id' => 'required|integer|exists:hoteles,id',
            'puntuacion' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string|max:255',
        ]);

        // Crear el comentario con el usuario autenticado
        comentarios::create([
            'fecha' => now(),
            'hotel_id' => $request->hotel_id, // ID del hotel relacionado
            'usuario_id' => Auth::id(), // ID del usuario autenticado
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

        // Verificar que el usuario autenticado sea el propietario
        if ($comentario->usuario_id !== Auth::id()) {
            return redirect()->back()->with('error', 'No tienes permiso para eliminar este comentario.');
        }

        // Eliminar el comentario
        $comentario->delete();

        return redirect()->back()->with('eliminarcomentario', 'Comentario eliminado correctamente.');
    }
}
