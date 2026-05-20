<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\ReservasController;

Route::get('/', [PaginaController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');
Route::get('/menu', [PaginaController::class, 'menu'])->name('menu');
Route::get('/reservas', [PaginaController::class, 'reservas'])->name('reservas');

Route::post('/pqrs', [PqrsController::class, 'store'])->name('pqrs.store');
Route::get('/mensaje', [PqrsController::class, 'index'])->name('mensaje');

Route::post('/reservas', [ReservasController::class, 'store'])->name('reservas.store');
Route::get('/exitosa', [ReservasController::class, 'index'])->name('exitosa');

