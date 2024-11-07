<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusquedaVuelosRequest extends FormRequest
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
            'origen' => 'required|string|max:50',
            'destino' => 'required|string|max:50',
            'fecha_ida' => 'required|date',
            'fecha_vuelta' => 'required|date|after_or_equal:fecha_ida',
        ];
    }
}

