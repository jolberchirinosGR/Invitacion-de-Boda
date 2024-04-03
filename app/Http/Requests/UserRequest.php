<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:190',
            'phone' => 'required|max:250',
            'confirm' => 'nullable|boolean',
            'id_role' => 'required|exists:roles,id',
            'id_responsable' => 'nullable|exists:users,id',
        ];
    
        return $rules;
    }

    /**
     * Return messages validated
     *
     * @return array<string>
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.max' => 'El campo nombre no puede ser mayor a :min caracteres.',
            'email.required' => 'El campo correo es obligatorio.',
            'email.max' => 'El campo correo no puede ser mayor a :min caracteres.',
            'email.unique' => 'Este correo ya está en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'id_role.required' => 'El campo rol es obligatorio.',
            'id_role.exists' => 'El rol proporcionado no es válido.',
        ];
    }
}
