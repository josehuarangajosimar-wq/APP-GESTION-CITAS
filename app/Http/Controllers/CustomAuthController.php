<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CustomAuthController extends Controller
{
    // Mostrar vistas
    public function showLogin() { return view('auth.login'); }
    public function showRegister() { return view('auth.register'); }
    public function showForgot() { return view('auth.forgot-password'); }

    // Procesar Registro
    public function register(Request $request)
    {
        $request->validate([
            'document_type' => 'required|in:DNI,CE,PASAPORTE',
            'document_number' => 'required|unique:users,document_number',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'birth_date' => 'required|date|before:today',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
            'privacy' => 'accepted',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'document_type' => $request->document_type,
            'document_number' => $request->document_number,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'terms_accepted_at' => Carbon::now(),
            'privacy_accepted_at' => Carbon::now(),
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Cuenta creada exitosamente.');
    }

    // Procesar Login por Documento
    public function login(Request $request)
    {
        $request->validate([
            'document_number' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intentar auth con document_number en lugar de email
        if (Auth::attempt(['document_number' => $request->document_number, 'password' => $request->password], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'document_number' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('document_number');
    }

    // Flujo de Recuperación (Match DNI + Email)
    public function processForgot(Request $request)
    {
        $request->validate([
            'document_number' => 'required|string',
            'email' => 'required|email',
        ]);

        $user = User::where('document_number', $request->document_number)
                    ->where('email', $request->email)
                    ->first();

        if (!$user) {
            // Mensaje ambiguo por seguridad (evita enumeración de cuentas)
            return back()->with('status', 'Si los datos coinciden, hemos enviado un enlace a tu correo.');
        }

        // Aquí iría la lógica de Password::broker()->sendResetLink()
        // Para este entregable, simularemos el éxito para UI:
        return back()->with('status', 'Se han enviado las instrucciones de recuperación a tu correo electrónico.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}