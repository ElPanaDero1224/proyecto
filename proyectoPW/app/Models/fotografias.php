<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fotografias extends Model
{
    //
    protected $fillable = [
        'nombre',
        'url_imagen',
        'descripcion',
        'hotel_id',
    ];
}
