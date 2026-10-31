<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'nacionalidad' => $this->nacionalidad,
            'libros' => LibroResource::collection($this->whenLoaded('libros')),
            'created_at' => $this->created_at,
        ];
    }
}
