<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        // 1. Forzamos a Socialite a compilar la URL con tus credenciales del services.php
        $socialiteResponse = Socialite::driver('google')->redirect();
        
        // 2. Extraemos el texto de la URL final (la misma que viste con el client_id completo)
        $targetUrl = $socialiteResponse->getTargetUrl();
        
        // 3. Hacemos un bypass: Redirección nativa y directa de Laravel hacia el exterior
        return redirect()->away($targetUrl);
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'email' => $googleUser->email,
            ], [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'password' => bcrypt(Str::random(16)), 
                'terms_accepted_at' => Carbon::now(),
                'privacy_accepted_at' => Carbon::now(),
            ]);

            Auth::login($user);
            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['document_number' => 'Error al autenticar con Google.']);
        }
    }
}