<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class comentarios extends Model
{
    // Relación inversa de un comentario con un usuario
    public function usuario()
    {
        return $this->belongsTo(usuarios::class, 'usuario_id'); // Asegúrate de que el nombre de la clave foránea sea 'usuario_id'
    }

    // Relación con el hotel
    public function hotel()
    {
        return $this->belongsTo(hotels::class);
    }
    protected $fillable = [
        'fecha',
        'hotel_id',  // Añadir hotel_id
        'usuario_id',
        'puntuacion',
        'comentario',
    ];
}
