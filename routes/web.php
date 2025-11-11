<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensajeController;

// Ruta que muestra el formulario para crear un nuevo mensaje
Route::get('/mensaje', [MensajeController::class, 'create'])->name('mensaje.create');

// Guardar mensaje
Route::post('/mensaje', [MensajeController::class, 'store'])->name('mensaje.store');

// Mostrar muro de mensajes
Route::get('/muro', [MensajeController::class, 'index'])->name('mensaje.index');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
