<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\AutorRequest;
use App\Http\Resources\AutorResource;
use Illuminate\Http\JsonResponse;

class AutorController extends Controller
{
    public function index()
    {
        return AutorResource::collection(Autor::all());
    }

    public function store(AutorRequest $request)
    {
        $autor = Autor::create($request->validated());
        return new AutorResource($autor);
    }

    public function show($id)
    {
        $autor = Autor::find($id);
        if (!$autor) return response()->json(['message' => 'Autor no encontrado'], 404);
        return new AutorResource($autor);
    }

    public function update(AutorRequest $request, $id)
    {
        $autor = Autor::find($id);
        if (!$autor) return response()->json(['message' => 'Autor no encontrado'], 404);
        $autor->update($request->validated());
        return new AutorResource($autor);
    }

    public function destroy($id): JsonResponse
    {
        $autor = Autor::find($id);
        if (!$autor) return response()->json(['message' => 'Autor no encontrado'], 404);
        $autor->delete();
        return response()->json(['message' => 'Autor eliminado correctamente'], 200);
    }

    // Endpoint especial: GET /api/autores/{id}/libros con eager loading (with)
    public function libros($id)
    {
        $autor = Autor::with('libros')->find($id);
        if (!$autor) return response()->json(['message' => 'Autor no encontrado'], 404);
        return new AutorResource($autor);
    }
}
