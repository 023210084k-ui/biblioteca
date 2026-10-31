<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Requests\LibroRequest;
use App\Http\Resources\LibroResource;
use Illuminate\Http\JsonResponse;

class LibroController extends Controller
{
    public function index()
    {
        return LibroResource::collection(Libro::with('autor')->get());
    }

    public function store(LibroRequest $request)
    {
        $libro = Libro::create($request->validated());
        return new LibroResource($libro);
    }

    public function show($id)
    {
        $libro = Libro::with('autor')->find($id);
        if (!$libro) return response()->json(['message' => 'Libro no encontrado'], 404);
        return new LibroResource($libro);
    }

    public function update(LibroRequest $request, $id)
    {
        $libro = Libro::find($id);
        if (!$libro) return response()->json(['message' => 'Libro no encontrado'], 404);
        $libro->update($request->validated());
        return new LibroResource($libro);
    }

    public function destroy($id): JsonResponse
    {
        $libro = Libro::find($id);
        if (!$libro) return response()->json(['message' => 'Libro no encontrado'], 404);
        $libro->delete();
        return response()->json(['message' => 'Libro eliminado correctamente'], 200);
    }
}