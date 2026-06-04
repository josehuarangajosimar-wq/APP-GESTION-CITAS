@extends('layouts.app')
@section('title', 'Inicio de Sesión')

@section('content')
<!-- Fondo verde ola estilo SANAR+ -->
<div class="min-h-screen flex items-center justify-center relative overflow-hidden" style="background-color: #52B7A0;">
    <!-- Forma orgánica de fondo simulada con CSS -->
    <div class="absolute top-0 left-0 w-full h-full opacity-20 bg-white" style="clip-path: ellipse(80% 50% at 50% -20%);"></div>
    <div class="absolute bottom-0 right-0 w-full h-full opacity-20 bg-white" style="clip-path: ellipse(60% 50% at 80% 120%);"></div>

    <div class="relative z-10 w-full max-w-4xl p-6">
        <h2 class="text-white text-2xl font-bold mb-6 drop-shadow-md">Inicio de sesión:</h2>
        
        <!-- Tarjeta Dividida -->
        <div class="flex flex-col md:flex-row bg-white rounded-2xl shadow-2xl overflow-hidden min-h-[400px]">
            
            <!-- Mitad Izquierda: Ilustración Vectorial -->
            <div class="hidden md:flex md:w-1/2 bg-white items-center justify-center p-8 border-r border-gray-100">
                <svg class="w-full h-64 text-[#52B7A0]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h-2v-2h2v2zm0-4h-2V7h2v6zm4 4h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
            </div>

            <!-- Mitad Derecha: Formulario SANAR+ -->
            <div class="w-full md:w-1/2 p-8 flex flex-col justify-center" style="background-color: #5abda6;">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold text-white tracking-wider">SANAR +</h1>
                </div>

                <!-- Formulario simulando el login para la entrega visual -->
                <form action="{{ route('dashboard') }}" method="GET" class="space-y-6">
                    <div>
                        <label class="block text-white text-sm font-semibold mb-2">Usuario</label>
                        <input type="text" class="w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-white text-sm font-semibold mb-2">Contraseña</label>
                        <input type="password" class="w-full px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white shadow-sm" required>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-white text-[#52B7A0] font-bold py-3 px-4 rounded-lg hover:bg-gray-100 transition duration-300 shadow-md">
                            Iniciar sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection