<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Exception;

class AuthController extends Controller
{
    /**
     * Redirige al proveedor OAuth (Google/GitHub)
     */
    public function redirect(string $provider)
    {
        // Validamos que solo se permitan proveedores configurados
        if (!in_array($provider, ['google', 'github'])) {
            return response()->json(['success' => false, 'message' => 'Proveedor no soportado.'], 400);
        }

        /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
        $driver = Socialite::driver($provider);

        // Retornamos la URL al frontend/cliente para que redirija al usuario
        return response()->json([
            'success' => true,
            'url' => $driver->stateless()->redirect()->getTargetUrl()
        ]);
    }

    /**
     * Procesa el callback del proveedor OAuth
     */
    public function callback(string $provider): JsonResponse
    {
        try {
            /** @var \Laravel\Socialite\Two\AbstractProvider $driver */
            $driver = Socialite::driver($provider);
            
            // Obtenemos el usuario desde el proveedor
            $socialUser = $driver->stateless()->user();

            // Buscamos o creamos al usuario en nuestra base de datos
            $user = User::updateOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                    'password' => bcrypt(Str::random(16)) // Contraseña aleatoria por seguridad
                ]
            );

            // Generamos el token API de Sanctum
            $token = $user->createToken('API_TOKEN_' . strtoupper($provider))->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Autenticación exitosa mediante ' . ucfirst($provider),
                'data' => [
                    'user' => $user,
                    'token' => $token,
                    'token_type' => 'Bearer'
                ]
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error durante la autenticación OAuth: ' . $e->getMessage()
            ], 500);
        }
    }
}