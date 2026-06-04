<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

// Redirigir la raíz al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Autenticación Visual
Route::get('/login', [WebController::class, 'showLogin'])->name('login');

// Panel Principal
Route::get('/dashboard', [WebController::class, 'dashboard'])->name('dashboard');

// Módulos CRUD (Tablas visuales)
Route::get('/pacientes', [WebController::class, 'pacientes'])->name('pacientes.index');
Route::get('/medicos', [WebController::class, 'medicos'])->name('medicos.index');
Route::get('/citas', [WebController::class, 'citas'])->name('citas.index');
Route::get('/diagnosticos', [WebController::class, 'diagnosticos'])->name('diagnosticos.index');
Route::get('/tratamientos', [WebController::class, 'tratamientos'])->name('tratamientos.index');
Route::get('/medicamentos', [WebController::class, 'medicamentos'])->name('medicamentos.index');