@extends('layouts.app')
@section('title', 'Acceso al Sistema')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 p-4">
    <div class="w-full max-w-5xl flex bg-white rounded-3xl shadow-2xl overflow-hidden min-h-[550px]">
        
        <!-- Lado Izquierdo: Branding y Banner Médico -->
        <div class="hidden lg:flex w-1/2 flex-col justify-center items-center text-white p-12 relative overflow-hidden" style="background-color: #52B7A0;">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10 text-center">
                <h1 class="text-5xl font-extrabold tracking-wider mb-4">SANAR +</h1>
                <p class="text-lg font-medium text-teal-50">Tu portal integral de salud y bienestar.</p>
            </div>
            <!-- Icono Decorativo -->
            <svg class="relative z-10 w-48 h-48 mt-12 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
        </div>

        <!-- Lado Derecho: Formulario Institucional -->
        <div class="w-full lg:w-1/2 p-8 md:p-12 bg-white flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Iniciar Sesión</h2>
            <p class="text-gray-500 mb-8 text-sm">Ingresa tu número de documento para continuar.</p>

            @if($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm mb-6 border border-red-200">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Número de Documento</label>
                    <input type="text" name="document_number" value="{{ old('document_number') }}" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#52B7A0] focus:border-transparent transition" placeholder="Ej. 76543210" required>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-gray-700 text-sm font-bold">Contraseña</label>
                        <a href="{{ route('password.request') }}" class="text-sm font-semibold text-[#52B7A0] hover:underline">¿Olvidó su contraseña?</a>
                    </div>
                    <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#52B7A0] focus:border-transparent transition" placeholder="••••••••" required>
                </div>

                <button type="submit" class="w-full py-3 px-4 bg-[#52B7A0] hover:bg-[#45a08a] text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    Ingresar al Sistema
                </button>
            </form>

            <div class="mt-6 flex items-center justify-between">
                <span class="border-b w-1/5 lg:w-1/4 border-gray-300"></span>
                <span class="text-xs text-center text-gray-500 uppercase font-semibold">O continuar con</span>
                <span class="border-b w-1/5 lg:w-1/4 border-gray-300"></span>
            </div>

            <!-- Botón Google Oficial -->
            <a href="{{ route('google.login') }}" class="mt-6 flex items-center justify-center w-full py-3 px-4 border border-gray-300 rounded-xl hover:bg-gray-50 transition duration-300 shadow-sm">
                <svg class="w-5 h-5 mr-3" viewBox="0 0 48 48">
                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                </svg>
                <span class="text-gray-700 font-bold">Acceder con Google</span>
            </a>

            <p class="mt-8 text-center text-sm text-gray-600">
                ¿Aún no eres paciente? <a href="{{ route('register') }}" class="font-bold text-[#52B7A0] hover:underline">Crear cuenta médica</a>
            </p>
        </div>
    </div>
</div>
@endsection