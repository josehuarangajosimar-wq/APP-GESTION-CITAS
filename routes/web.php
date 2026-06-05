<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\SocialAuthController;

// Redirección base
Route::get('/', function () { return redirect()->route('login'); });

// --- FLUJO DE AUTENTICACIÓN ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [CustomAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [CustomAuthController::class, 'login'])->name('login.post');
    Route::get('/registro', [CustomAuthController::class, 'showRegister'])->name('register');
    Route::post('/registro', [CustomAuthController::class, 'register'])->name('register.post');
    Route::get('/recuperar-password', [CustomAuthController::class, 'showForgot'])->name('password.request');
    Route::post('/recuperar-password', [CustomAuthController::class, 'processForgot'])->name('password.email');

    Route::get('/auth/google/redirect', [SocialAuthController::class, 'redirect'])->name('google.login');
    Route::get('/auth/google/callback', [SocialAuthController::class, 'callback']);
});

// --- RUTAS PROTEGIDAS DEL SISTEMA MÉDICO ---
Route::middleware('auth')->group(function () {
    // LOGOUT SEGURO (POST)
    Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
    
    // Panel Principal
    Route::get('/dashboard', [WebController::class, 'dashboard'])->name('dashboard');

    // PACIENTES (Rutas Completas para botones)
    Route::get('/pacientes', [WebController::class, 'pacientes'])->name('pacientes.index');
    Route::get('/pacientes/crear', [WebController::class, 'createPaciente'])->name('pacientes.create');
    Route::get('/pacientes/{id}/editar', [WebController::class, 'editPaciente'])->name('pacientes.edit');
    Route::delete('/pacientes/{id}', [WebController::class, 'destroyPaciente'])->name('pacientes.destroy');

    // El resto de módulos apuntando a index (puedes replicar la misma lógica CRUD arriba cuando crees sus vistas)
    Route::get('/medicos', [WebController::class, 'medicos'])->name('medicos.index');
    Route::get('/citas', [WebController::class, 'citas'])->name('citas.index');
    Route::get('/diagnosticos', [WebController::class, 'diagnosticos'])->name('diagnosticos.index');
    Route::get('/tratamientos', [WebController::class, 'tratamientos'])->name('tratamientos.index');
    Route::get('/medicamentos', [WebController::class, 'medicamentos'])->name('medicamentos.index');
});