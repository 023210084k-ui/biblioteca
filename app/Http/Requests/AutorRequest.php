<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $autorId = $this->route('autore') ?? $this->route('autor');

        return [
            'nombre' => 'required|string|max:255|unique:autores,nombre,' . $autorId,
            'nacionalidad' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del autor es obligatorio.',
            'nombre.unique' => 'Ya existe un autor registrado con ese nombre.',
            'nacionalidad.required' => 'La nacionalidad es obligatoria.',
        ];
    }
}