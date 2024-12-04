<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hotels extends Model
{
    //
    public function fotografias()
{
    return $this->hasMany(fotografias::class, 'hotel_id');
}

 // Relación con comentarios
 public function comentarios()
{
    return $this->hasMany(comentarios::class, 'hotel_id');
}
// App\Models\Hotels.php
public function getRatingPromedioAttribute()
{
    if ($this->comentarios->isEmpty()) {
        return 0; // Si no hay comentarios, el promedio es 0
    }

    return round($this->comentarios->avg('puntuacion'), 1); // Redondear a 1 decimal
}


}
