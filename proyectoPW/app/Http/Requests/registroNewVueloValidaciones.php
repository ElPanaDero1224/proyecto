<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registroNewVueloValidaciones extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'numeroVuelo' => 'required|numeric|max:100000|min:0',
            'aerolinea' => 'required',
            'horario'=> 'required',
            'precio' => 'required|numeric|min:0',
            'escalas' => 'required',
            'asientos'=> 'required|numeric|min:0',
        ];
    }
}
