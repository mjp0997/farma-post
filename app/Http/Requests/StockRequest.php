<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'stock' => 'required|integer|gt:0'
        ];
    }

    public function messages()
    {
        return [
            'stock.required' => 'El valor a incrementar es obligatorio',
            'stock.integer' => 'El valor a incrementar debe ser un número entero',
            'stock.gt' => 'El valor a incrementar debe ser mayor a 0',
        ];
    }
}
