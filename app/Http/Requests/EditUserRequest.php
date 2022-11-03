<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()) {
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
            'name' => 'required',
            'username' => 'required',
            'password' => 'nullable|min:6',
            'role_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ingrese el nombre',
            'username.required' => 'Ingrese el nombre de usuario',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'role_id.required' => 'Seleccione el rol'
        ];
    }
}
