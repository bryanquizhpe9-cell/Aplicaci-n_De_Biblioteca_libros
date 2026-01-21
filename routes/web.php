<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;


Route::get('/', [LibroController::class, 'inicio']); 
Route::get('/catalogo', [LibroController::class, 'index']);
Route::get('/libros/{id}/ver', [LibroController::class, 'show'])->name('libros.show');


Route::middleware(['auth'])->group(function () {
    // 1. Ver la lista
    Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
    
    // 2. Crear (Formulario y Guardar)
    Route::get('/libros/crear', [LibroController::class, 'create'])->name('libros.create');
    Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
    // 3. ver libros
    Route::get('/libros/{id}/ver', [LibroController::class, 'show'])->name('libros.show');
   
    
    // 4. Editar (Formulario y Actualizar)
    Route::get('/libros/{id}/editar', [LibroController::class, 'edit'])->name('libros.edit');
    Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
    
    // 5. Borrar
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
});




require __DIR__.'/auth.php';
