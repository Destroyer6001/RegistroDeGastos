<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriaRequest extends FormRequest
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
        $user_Id = auth()->id();
        $categoryId = $this->route('id');
        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categorias', 'name')->ignore($categoryId)->where(function ($query) use ($user_Id) {
                    $query->where('user_id', $user_Id);
                }),
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido',
            'name.string' => 'El campo debe ser tipo texto',
            'name.max' => 'El campo debe tener como maximo 100 caracteres',
            'name.unique' => 'Ya existe una categoria registrada con ese nombre para este usuario'
        ];
    }

    public function prepareForValidation()
    {
        $id = auth()->id();
        
        $this->merge([
            'user_Id' => $id
        ]);
    }
}
