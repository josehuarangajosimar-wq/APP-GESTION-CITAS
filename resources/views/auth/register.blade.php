@extends('layouts.app')
@section('title', 'Registro de Paciente')

@section('content')
<div class="min-h-screen bg-gray-50 py-10 px-4 flex justify-center items-center">
    <div class="max-w-4xl w-full bg-white rounded-3xl shadow-xl p-8 md:p-12 border-t-8" style="border-color: #52B7A0;">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-800">Apertura de Historia Clínica Virtual</h2>
            <p class="text-gray-500 mt-2">Completa tus datos reales para habilitar tu atención médica.</p>
        </div>

        <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Nombre Completo <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Correo Electrónico <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Tipo de Documento <span class="text-red-500">*</span></label>
                    <select name="document_type" class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-[#52B7A0] outline-none">
                        <option value="DNI">DNI (Nacional)</option>
                        <option value="CE">Carnet de Extranjería (Residente)</option>
                        <option value="PASAPORTE">Pasaporte (Extranjero)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Número de Documento <span class="text-red-500">*</span></label>
                    <input type="text" name="document_number" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Fecha de Nacimiento <span class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Teléfono Móvil <span class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Crear Contraseña <span class="text-red-500">*</span></label>
                    <input type="password" name="password" required minlength="8" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Confirmar Contraseña <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#52B7A0] outline-none">
                </div>
            </div>

            <div class="mt-8 bg-gray-50 p-6 rounded-xl border border-gray-200 space-y-4">
                <label class="flex items-start cursor-pointer">
                    <input type="checkbox" name="terms" required class="mt-1 w-5 h-5 text-[#52B7A0] border-gray-300 rounded focus:ring-[#52B7A0]">
                    <span class="ml-3 text-sm text-gray-700">Declaro que la información proporcionada es veraz y acepto los <a href="#" class="text-[#52B7A0] font-bold underline">Términos y Condiciones</a> del servicio médico.</span>
                </label>
                <label class="flex items-start cursor-pointer">
                    <input type="checkbox" name="privacy" required class="mt-1 w-5 h-5 text-[#52B7A0] border-gray-300 rounded focus:ring-[#52B7A0]">
                    <span class="ml-3 text-sm text-gray-700">Autorizo explícitamente el tratamiento de mis <a href="#" class="text-[#52B7A0] font-bold underline">Datos Personales y Clínicos</a>.</span>
                </label>
            </div>

            <button type="submit" class="w-full mt-6 py-4 bg-[#52B7A0] hover:bg-[#45a08a] text-white text-lg font-bold rounded-xl shadow-lg transition duration-300">
                Registrar Paciente y Acceder
            </button>
            
            <p class="text-center text-sm text-gray-600 mt-4">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="font-bold text-[#52B7A0] hover:underline">Iniciar Sesión</a>
            </p>
        </form>
    </div>
</div>
@endsection