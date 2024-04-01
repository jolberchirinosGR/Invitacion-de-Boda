<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|integer',
            'updated_by' => 'required|integer',
            'type' => 'required|string',
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'El ID es requerido.',
            'id.integer' => 'El ID debe ser un número entero.',
            'updated_by.required' => 'El campo actualizado por es requerido.',
            'updated_by.integer' => 'El campo actualizado por debe ser un número entero.',
            'type.required' => 'El tipo es requerido.',
            'type.string' => 'El tipo debe ser una cadena de texto.',
            'name.required' => 'El nombre es requerido.',
            'name.regex' => 'El nombre solo puede contener letras y números.',
        ];
    }
}
