<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;

Route::apiResource('autores', AutorController::class);
Route::apiResource('libros', LibroController::class);

// Endpoint obligatorio con eager loading
Route::get('autores/{id}/libros', [AutorController::class, 'libros']);
