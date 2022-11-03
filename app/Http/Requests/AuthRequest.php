<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!Auth::check()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required|min:6',
            'remember' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Ingrese su usuario',
            'password.required' => 'Ingrese su contraseña',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'remember.boolean' => '??????',
        ];
    }
}
