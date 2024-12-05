<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    
public function hoteles()
{
    return $this->hasMany(Hotels::class, 'destino_id');
}

}
