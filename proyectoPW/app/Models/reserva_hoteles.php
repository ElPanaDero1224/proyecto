<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Asegúrate de importarlo
use Illuminate\Database\Eloquent\Model;

class reserva_hoteles extends Model
{
    use HasFactory; // Usa el trait HasFactory en el modelo

    // Si es necesario, especifica la tabla
    protected $table = 'reserva_hoteles';
}
