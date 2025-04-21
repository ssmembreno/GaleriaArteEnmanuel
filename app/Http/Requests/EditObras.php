<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditObras extends FormRequest
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
            'nombre' => 'required|max:30',
            'descripcion' => 'required|min:10|max:200',
            'precio' => 'required|decimal:2,4',
            'tamaño' => 'required|string',
            'estado' => 'required|string',
            'imagen' => 'required|string',
            'artista_id' => 'required|string',
            'tipo_obra_id' => 'required|string',

        ];
    }
}
