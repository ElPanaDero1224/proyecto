<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitaciones extends Model
{
    //
    public function hotel()
{
    return $this->belongsTo(hotels::class);
}
}
