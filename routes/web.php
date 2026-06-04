<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

// Redirigir la raíz al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta de Login (¡ESTO SOLUCIONA TU ERROR DE POSTMAN!)
Route::get('/login', [WebController::class, 'showLogin'])->name('login');

// Rutas del Panel y Módulos
Route::get('/dashboard', [WebController::class, 'dashboard'])->name('dashboard');
Route::get('/pacientes', [WebController::class, 'pacientes'])->name('pacientes.index');