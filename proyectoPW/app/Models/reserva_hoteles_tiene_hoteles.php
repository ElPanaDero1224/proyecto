<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Asegúrate de importarlo
use Illuminate\Database\Eloquent\Model;

class reserva_hoteles_tiene_hoteles extends Model
{
    use HasFactory;

    protected $table = 'reserva_hoteles_tiene_hoteles';

    protected $fillable = [
        'cantidad',
        'reserva_hotel_id',
        'hotel_id',
    ];
}