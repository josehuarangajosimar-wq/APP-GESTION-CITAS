@extends('layouts.app')
@section('title', 'Tabla de Pacientes')

@section('content')
<div class="min-h-screen bg-gray-50 p-8">
    
    <!-- Botón Volver al Panel -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="text-[#52B7A0] font-bold hover:underline flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Volver al Panel
        </a>
    </div>

    <!-- Contenedor de la Tabla -->
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Tabla de pacientes</h2>
        
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md shadow-md mb-6 transition duration-300">
            Agregar Paciente
        </button>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Apellido</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Fecha Nacimiento</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">DNI</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase tracking-wider">Teléfono</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <!-- Iteración de pacientes desde la Base de Datos -->
                    @foreach($pacientes as $paciente)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $paciente->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $paciente->nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $paciente->apellido }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $paciente->fecha_nacimiento }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $paciente->dni }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">{{ $paciente->telefono }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-4 rounded shadow transition duration-200">Editar</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded shadow transition duration-200">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection