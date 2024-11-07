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
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|max:2048', // Si el campo es opcional y permite imágenes hasta 2 MB
        ];
    }
}
