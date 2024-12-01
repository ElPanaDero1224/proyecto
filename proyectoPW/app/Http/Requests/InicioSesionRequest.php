<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InicioSesionRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Reglas de validación.
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
}

