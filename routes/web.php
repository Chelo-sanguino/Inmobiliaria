<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropiedadController;

// Ruta principal que muestra la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas para las propiedades
Route::resource('propiedades', PropiedadController::class);