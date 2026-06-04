@extends('layouts.app')
@section('title', 'Inventario de Medicamentos')
@section('content')
<div class="min-h-screen bg-gray-50 p-8">
    <div class="mb-6"><a href="{{ route('dashboard') }}" class="text-[#52B7A0] font-bold hover:underline">Volver al Panel</a></div>
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Catálogo de Medicamentos</h2>
        <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-md shadow-md mb-6">Agregar Fármaco</button>
        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Nombre</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Concentración</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-blue-900 uppercase">Presentación</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($medicamentos as $med)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-700 font-bold">{{ $med->nombre }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $med->concentracion }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $med->presentacion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection