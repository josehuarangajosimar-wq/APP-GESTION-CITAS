@extends('layouts.app')
@section('title', 'Panel Principal')

@section('content')
<div class="min-h-screen relative overflow-x-hidden" style="background-color: #52B7A0;">
    <div class="absolute top-0 w-full h-64 bg-white opacity-10" style="clip-path: ellipse(150% 100% at 50% 0%);"></div>

    <div class="relative z-10 container mx-auto px-4 py-12 flex flex-col justify-between min-h-screen">
        
        <div>
            <h1 class="text-white text-xl md:text-2xl font-bold mb-4 drop-shadow-md tracking-wide">Vistas - Sistema de Gestión SANAR + :</h1>
            
            <div class="text-center mb-16 mt-12">
                <h2 class="text-3xl md:text-5xl font-extrabold text-white tracking-widest drop-shadow-lg uppercase">SISTEMA DE GESTIÓN SANAR +</h2>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 max-w-6xl mx-auto justify-items-center">
                
                <a href="{{ route('pacientes.index') }}" class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center justify-center w-40 h-40 hover:-translate-y-2 transition transform duration-300 group">
                    <div class="p-3 bg-teal-50 rounded-xl group-hover:bg-[#52B7A0] transition duration-300">
                        <svg class="w-10 h-10 text-[#52B7A0] group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800 mt-3">Pacientes</span>
                </a>
                
                <a href="{{ route('medicos.index') }}" class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center justify-center w-40 h-40 hover:-translate-y-2 transition transform duration-300 group">
                    <div class="p-3 bg-teal-50 rounded-xl group-hover:bg-[#52B7A0] transition duration-300">
                        <svg class="w-10 h-10 text-[#52B7A0] group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800 mt-3">Médicos</span>
                </a>
                
                <a href="{{ route('citas.index') }}" class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center justify-center w-40 h-40 hover:-translate-y-2 transition transform duration-300 group">
                    <div class="p-3 bg-teal-50 rounded-xl group-hover:bg-[#52B7A0] transition duration-300">
                        <svg class="w-10 h-10 text-[#52B7A0] group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800 mt-3">Citas</span>
                </a>
                
                <a href="{{ route('diagnosticos.index') }}" class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center justify-center w-40 h-40 hover:-translate-y-2 transition transform duration-300 group">
                    <div class="p-3 bg-teal-50 rounded-xl group-hover:bg-[#52B7A0] transition duration-300">
                        <svg class="w-10 h-10 text-[#52B7A0] group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800 mt-3">Diagnósticos</span>
                </a>
                
                <a href="{{ route('tratamientos.index') }}" class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center justify-center w-40 h-40 hover:-translate-y-2 transition transform duration-300 group">
                    <div class="p-3 bg-teal-50 rounded-xl group-hover:bg-[#52B7A0] transition duration-300">
                        <svg class="w-10 h-10 text-[#52B7A0] group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800 mt-3">Tratamientos</span>
                </a>
                
                <a href="{{ route('medicamentos.index') }}" class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center justify-center w-40 h-40 hover:-translate-y-2 transition transform duration-300 group">
                    <div class="p-3 bg-teal-50 rounded-xl group-hover:bg-[#52B7A0] transition duration-300">
                        <svg class="w-10 h-10 text-[#52B7A0] group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800 mt-3">Medicamentos</span>
                </a>

            </div>
        </div>

        <div class="flex justify-end mt-12">
            <a href="{{ route('login') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2.5 px-8 rounded-xl shadow-lg transition duration-300 hover:scale-105 transform">
                Cerrar sesión
            </a>
        </div>

    </div>
</div>
@endsection