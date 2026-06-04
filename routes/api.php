<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PacienteController;
use App\Http\Controllers\Api\V1\CitaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Rutas de información de usuario autenticado (se usará tras OAuth)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\Api\V1\AuthController;

// Rutas de Autenticación OAuth (Públicas)
Route::prefix('v1/auth')->group(function () {
    Route::get('{provider}/redirect', [AuthController::class, 'redirect']);
    Route::get('{provider}/callback', [AuthController::class, 'callback']);
});

// Grupo de rutas de la API Versión 1
Route::prefix('v1')->group(function () {
    
    // Rutas protegidas que requieren Token API en los headers
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('pacientes', PacienteController::class);
        Route::apiResource('citas', CitaController::class);
        
        // Aquí irían las demás en el futuro
    });
    
});