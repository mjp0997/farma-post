<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'dni' => 'required|integer|gt:0',
            'name' => 'required|string',
            'phone' => 'required|numeric|gt:0',
            'address' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'dni.required' => 'La cédula es obligatoria',
            'dni.integer' => 'La cédula debe ser un entero',
            'dni.gt' => 'La cédula debe ser mayor a 0',
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre es obligatorio',
            'phone.required' => 'El teléfono es obligatorio',
            'phone.numeric' => 'El teléfono debe ser numérico',
            'phone.gt' => 'El teléfono debe ser mayor a 0',
            'address.required' => 'La dirección es obligatoria',
            'address.string' => 'La dirección es obligatoria',
        ];
    }
}
