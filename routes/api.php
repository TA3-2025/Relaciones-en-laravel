<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;

Route::get('/animal', [AnimalController::class, 'ListarTodos']);   
Route::get('/animal/{d}', [AnimalController::class, 'Buscar']);   
Route::post('/animal', [AnimalController::class, 'Crear']);
Route::delete("/animal/{d}", [AnimalController::class, 'Eliminar']);
Route::put("/animal/{d}", [AnimalController::class, 'Modificar']);