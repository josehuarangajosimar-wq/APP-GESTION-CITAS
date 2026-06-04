@extends('layouts.app')
@section('title', 'Diagnósticos')
@section('content')
<div class="min-h-screen bg-gray-50 p-8">
    <div class="mb-6"><a href="{{ route('dashboard') }}" class="text-[#52B7A0] font-bold hover:underline">Volver al Panel</a></div>
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Historial de Diagnósticos</h2>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">ID Cita</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Descripción</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Gravedad</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($diagnosticos as $diagnostico)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-700 font-bold">#{{ $diagnostico->cita_id }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $diagnostico->descripcion }}</td>
                        <td class="px-6 py-4 text-gray-700 uppercase font-semibold">{{ $diagnostico->nivel_gravedad }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection