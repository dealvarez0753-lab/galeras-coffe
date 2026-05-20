<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\ReservasController;

// Rutas Públicas
Route::get('/', [PaginaController::class, 'inicio'])->name('inicio');
Route::get('/menu', [PaginaController::class, 'menu'])->name('menu');
Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::post('/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');
Route::get('/reservas', [PaginaController::class, 'reservas'])->name('reservas');
Route::post('/reservas', [ReservasController::class, 'store'])->name('reservas.store');
Route::get('/mensaje', [PqrsController::class, 'index'])->name('mensaje');
Route::get('/exitosa', [ReservasController::class, 'index'])->name('exitosa');

// Rutas Protegidas
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/mensajes', [PqrsController::class, 'index'])->name('mensajes');
    Route::get('/editar_mensaje/{id}', [PqrsController::class, 'edit'])->name('mensajes.edit');
    Route::put('/mensajes/{id}', [PqrsController::class, 'update'])->name('mensajes.update');
    Route::delete('/mensajes/{id}', [PqrsController::class, 'destroy'])->name('mensajes.destroy');
});
require __DIR__.'/auth.php';