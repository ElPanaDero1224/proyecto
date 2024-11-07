<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorhotelesAdmiEdit extends FormRequest
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
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required|string|max:500',
                'ubicacion' => 'required|string|max:255',
                'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0',
        ];
    }
}
