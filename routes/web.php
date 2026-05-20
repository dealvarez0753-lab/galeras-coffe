<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PqrsController;
use App\Http\Controllers\ReservasController;

/*rutas publicas*/

Route::get('/', [PaginaController::class, 'inicio'])
    ->name('inicio');

Route::get('/menu', [PaginaController::class, 'menu'])
    ->name('menu');

Route::get('/nosotros', [PaginaController::class, 'nosotros'])
    ->name('nosotros');

Route::get('/contacto', [PaginaController::class, 'contacto'])
    ->name('contacto');

/*pqrs*/

Route::post('/pqrs', [PqrsController::class, 'store'])
    ->name('pqrs.store');

/*reservas*/

Route::get('/reservas', [PaginaController::class, 'reservas'])
    ->name('reservas');

Route::post('/reservas', [ReservasController::class, 'store'])
    ->name('reservas.store');

/*rutas privadas*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*dashboard*/

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*perfil*/

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*mensajes*/

    Route::get('/mensaje', [PqrsController::class, 'index'])
        ->name('mensaje');

    Route::get('/editar_mensaje/{id}', [PqrsController::class, 'edit'])
        ->name('mensajes.edit');

    Route::put('/mensaje/{id}', [PqrsController::class, 'update'])
        ->name('mensajes.update');

    Route::delete('/mensaje/{id}', [PqrsController::class, 'destroy'])
        ->name('mensajes.destroy');

    /*
    vista exitosa privada*/

    Route::get('/exitosa', [ReservasController::class, 'index'])
        ->name('exitosa');
});

/*autenticacion*/

require __DIR__.'/auth.php';