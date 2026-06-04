<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Http\Resources\CitaResource;
use Illuminate\Http\JsonResponse;

class CitaController extends Controller
{
    public function index(): JsonResponse
    {
        // Se usa "with" para evitar el problema de consultas N+1 (Optimización DB)
        $citas = Cita::with(['paciente', 'medico'])->latest()->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Historial de citas recuperado con éxito.',
            'data' => CitaResource::collection($citas)
        ], 200);
    }

    public function store(StoreCitaRequest $request): JsonResponse
    {
        try {
            $cita = Cita::create($request->validated());
            $cita->load(['paciente', 'medico']);
            
            return response()->json([
                'success' => true,
                'message' => 'Cita médica agendada correctamente.',
                'data' => new CitaResource($cita)
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al agendar cita: ' . $e->getMessage()], 500);
        }
    }

    public function show(Cita $cita): JsonResponse
    {
        $cita->load(['paciente', 'medico']);
        return response()->json([
            'success' => true,
            'message' => 'Detalle de la cita recuperado.',
            'data' => new CitaResource($cita)
        ], 200);
    }

    public function update(UpdateCitaRequest $request, Cita $cita): JsonResponse
    {
        try {
            $cita->update($request->validated());
            $cita->load(['paciente', 'medico']);
            
            return response()->json([
                'success' => true,
                'message' => 'Cita actualizada correctamente.',
                'data' => new CitaResource($cita)
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar la cita.'], 500);
        }
    }

    public function destroy(Cita $cita): JsonResponse
    {
        try {
            $cita->delete();
            return response()->json([
                'success' => true,
                'message' => 'Cita médica eliminada correctamente.',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar la cita.'], 500);
        }
    }
}