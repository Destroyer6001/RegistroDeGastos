<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'el campo nombre es requerido',
            'name.string' => 'el campo nombre debe ser tipo texto',
            'name.max' => 'el campo nombre debe tener un maximo de 100 caracteres',
            'email.required'=> 'el campo email es requerido',
            'email.unique' => 'el campo email es un campo unico',
            'email.email' => 'el campo email tiene que ser tipo email',
            'password.required' => 'el campo password es requerido',
            'password.min' => 'el campo password debe tener como minimo 8 caracteres',
            'password.confirmed' => 'el campo password debe coincidir con el campo de confirmacion de contraseña' 
        ];
    }
}
