<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'files'  => 'required', // Esta regla verifica que cada elemento en 'files' sea un archivo válido
            'files.*' => 'required|file', // Esta regla verifica que cada elemento en 'files' sea un archivo válido
        ];
    }

    public function messages()
    {
        return [
            'files.required' => 'Los archivos estan vacíos.',
            'files.*.required' => 'Uno de los archivos está vacío.',
            'files.*.file' => 'Uno de los elementos no es un archivo válido.',
        ];
    }
}
