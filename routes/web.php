<?php

use App\Http\Controllers\PropiedadController;
use Illuminate\Support\Facades\Route;

// Rutas RESTful completas para PropiedadController
Route::resource('propiedades', PropiedadController::class);

// Rutas específicas 
Route::get('propiedades', [PropiedadController::class, 'index'])->name('propiedades.index'); // Listar propiedades
Route::post('propiedades', [PropiedadController::class, 'store'])->name('propiedades.store'); // Crear propiedad
Route::get('propiedades/{id}', [PropiedadController::class, 'show'])->name('propiedades.show'); // Ver una propiedad
Route::put('propiedades/{id}', [PropiedadController::class, 'update'])->name('propiedades.update'); // Actualizar propiedad
Route::delete('propiedades/{id}', [PropiedadController::class, 'destroy'])->name('propiedades.destroy'); // Eliminar propiedad
