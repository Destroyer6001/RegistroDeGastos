<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GastosRequest extends FormRequest
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
            'date' => 'date|required',
            'value' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'el campo fecha es requerido',
            'date.date' => 'el campo fecha de ser una fecha',
            'value.integer' => 'el campo valor debe ser un dato monetario',
            'value.required' => 'el campo valor es requerido'
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
