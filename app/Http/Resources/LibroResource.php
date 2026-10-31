<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'isbn' => $this->isbn,
            'precio' => $this->precio,
            'autor_id' => $this->autor_id,
            'nombre_autor' => $this->autor->nombre ?? null,
            'created_at' => $this->created_at,
        ];
    }
}