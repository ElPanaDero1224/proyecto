<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Asegúrate de manejar la autorización si es necesario
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'categoria' => 'required|integer|min:1|max:5',
            'descripcion' => 'required|string',
            'servicios' => 'required|string',
            'distancia_puntos_turisticos' => 'required|string',
            'distancia_centro' => 'required|integer|min:0',
            'capacidad' => 'required|integer|min:0',
            'precio_por_noche' => 'required|integer|min:0',
            'politicas_cancelacion' => 'required|string',
        ];
    }
}
