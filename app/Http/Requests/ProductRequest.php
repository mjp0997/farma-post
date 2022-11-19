<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: validar que sea un usuario admin
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
            'name' => 'required|max:255',
            'buy_price' => 'required|numeric|gt:0',
            'sell_price' => 'required|numeric|gt:0',
            'stock' => 'required|integer|min:0'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'buy_price.required' => 'El precio de compra es obligatorio',
            'buy_price.numeric' => 'El precio de compra debe ser un número',
            'buy_price.gt' => 'El precio de compra mínimo es 0.01',
            'sell_price.required' => 'El precio de venta es obligatorio',
            'sell_price.numeric' => 'El precio de venta debe ser un número',
            'sell_price.gt' => 'El precio de venta mínimo es 0.01',
            'stock.required' => 'El stock es obligatorio',
            'stock.integer' => 'El stock debe ser un entero',
            'stock.min' => 'El stock mínimo es 0'
        ];
    }
}
