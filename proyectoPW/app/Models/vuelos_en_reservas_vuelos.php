<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\vuelos; // Ensure that the Vuelo class exists in the specified namespace

class vuelos_en_reservas_vuelos extends Model
{
    use HasFactory;

    protected $table = 'vuelos_en_reservas_vuelos';

    // Relación con el modelo Vuelo
    public function vuelo()
    {
        return $this->belongsTo(vuelos::class, 'vuelo_id');
    }
}
