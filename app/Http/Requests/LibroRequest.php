<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $libroId = $this->route('libro');

        return [
            'autor_id' => 'required|exists:autores,id',
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|unique:libros,isbn,' . $libroId,
            'precio' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'autor_id.required' => 'El autor es obligatorio.',
            'autor_id.exists' => 'El autor seleccionado no existe.',
            'titulo.required' => 'El título del libro es obligatorio.',
            'isbn.required' => 'El ISBN del libro es obligatorio.',
            'isbn.unique' => 'El ISBN ingresado ya está registrado.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
        ];
    }
}
