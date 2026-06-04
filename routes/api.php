<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PacienteController;
use App\Http\Controllers\Api\V1\CitaController;
use App\Http\Controllers\Api\V1\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rutas de Autenticación de la API
Route::prefix('v1/auth')->name('api.v1.auth.')->group(function () {
    Route::get('{provider}/redirect', [AuthController::class, 'redirect']);
    Route::get('{provider}/callback', [AuthController::class, 'callback']);
});

// Rutas del Core de la API Médica Protegidas
Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('pacientes', PacienteController::class);
        Route::apiResource('citas', CitaController::class);
    });
});