<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;


Route::get('/', [LibroController::class, 'inicio']); 
Route::get('/catalogo', [LibroController::class, 'index']);
Route::get('/libros/{id}/ver', [LibroController::class, 'show'])->name('libros.show');
Route::post('/libros/{id}/favorito', [LibroController::class, 'marcarFavorito'])->name('libros.favorito');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [LibroController::class, 'inicio']);

    Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
    Route::get('/libros/crear', [LibroController::class, 'create'])->name('libros.create');
    Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
    Route::get('/libros/{id}/ver', [LibroController::class, 'show'])->name('libros.show');
    Route::get('/libros/{id}/editar', [LibroController::class, 'edit'])->name('libros.edit');
    Route::put('/libros/{id}', [LibroController::class, 'update'])->name('libros.update');
    Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');
});




require __DIR__.'/auth.php';
