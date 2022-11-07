<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientOperationRequest extends FormRequest
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
            'dni' => 'required|integer|gt:0'
        ];
    }

    public function messages()
    {
        return [
            'dni.required' => 'La cédula es obligatoria',
            'dni.integer' => 'La cédula debe ser un entero',
            'dni.gt' => 'La cédula debe ser mayor a 0',
        ];
    }
}
