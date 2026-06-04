@extends('layouts.app')
@section('title', 'Tabla de Médicos')
@section('content')
<div class="min-h-screen bg-gray-50 p-8">
    <div class="mb-6"><a href="{{ route('dashboard') }}" class="text-[#52B7A0] font-bold hover:underline flex items-center">Volver al Panel</a></div>
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Directorio de Médicos</h2>
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md shadow-md mb-6">Agregar Médico</button>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">CMP</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Nombre Completo</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Especialidad</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-blue-900 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($medicos as $medico)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-bold text-[#52B7A0]">{{ $medico->cmp }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $medico->nombre }} {{ $medico->apellido }}</td>
                        <td class="px-6 py-4 text-gray-700"><span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $medico->especialidad }}</span></td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-1 px-3 rounded">Editar</button>
                            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection