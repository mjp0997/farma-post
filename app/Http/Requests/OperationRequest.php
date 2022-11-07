<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperationRequest extends FormRequest
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
            'client_id' => 'required|integer|gt:0',
            'cart' => 'required|array',
            'cart.*.id' => 'required|integer|gt:0',
            'cart.*.quantity' => 'required|integer|gt:0',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'El id del cliente es obligatorio',
            'client_id.integer' => 'El id del cliente debe ser un entero',
            'client_id.gt' => 'El id del cliente debe ser mayor a 0',
            'cart.required' => 'El carro es obligatorio',
            'cart.array' => 'El carro debe ser un arreglo',
            'cart.*.id.required' => 'El id del producto es obligatorio',
            'cart.*.id.integer' => 'El id del producto debe ser un entero',
            'cart.*.id.gt' => 'El id del producto debe ser mayor a 0',
            'cart.*.quantity.required' => 'La cantidad del producto es obligatoria',
            'cart.*.quantity.integer' => 'La cantidad del producto debe ser un entero',
            'cart.*.quantity.gt' => 'La cantidad del producto debe ser mayor a 0',
        ];
    }
}
