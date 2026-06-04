@extends('layouts.app')
@section('title', 'Tratamientos')
@section('content')
<div class="min-h-screen bg-gray-50 p-8">
    <div class="mb-6"><a href="{{ route('dashboard') }}" class="text-[#52B7A0] font-bold hover:underline">Volver al Panel</a></div>
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Tratamientos Activos</h2>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">ID Diag.</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Instrucciones</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Duración (Días)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($tratamientos as $tratamiento)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-700 font-bold">#{{ $tratamiento->diagnostico_id }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $tratamiento->instrucciones }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $tratamiento->duracion_dias }} días</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection