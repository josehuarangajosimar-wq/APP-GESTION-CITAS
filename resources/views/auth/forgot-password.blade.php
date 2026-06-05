@extends('layouts.app')
@section('title', 'Recuperar Contraseña')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl p-8 border-t-8" style="border-color: #52B7A0;">
        <div class="text-center mb-8">
            <svg class="mx-auto h-16 w-16 text-[#52B7A0] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            <h2 class="text-2xl font-bold text-gray-800">Recuperar Acceso</h2>
            <p class="text-sm text-gray-500 mt-2">Por seguridad, requerimos validar su correo electrónico junto con su número de documento.</p>
        </div>

        @if(session('status'))
            <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-xl text-sm mb-6 text-center font-semibold">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Número de Documento</label>
                <input type="text" name="document_number" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none" placeholder="Ej. 76543210">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico Registrado</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none" placeholder="correo@ejemplo.com">
            </div>

            <button type="submit" class="w-full py-3 bg-[#52B7A0] hover:bg-[#45a08a] text-white font-bold rounded-xl shadow-lg transition duration-300">
                Verificar y Enviar Enlace
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-[#52B7A0] transition">Volver al inicio de sesión</a>
        </div>
    </div>
</div>
@endsection