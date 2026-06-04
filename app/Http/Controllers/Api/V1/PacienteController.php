<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Http\Resources\PacienteResource;
use Illuminate\Http\JsonResponse;

class PacienteController extends Controller
{
    public function index(): JsonResponse
    {
        $pacientes = Paciente::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Lista de pacientes recuperada con éxito.',
            'data' => PacienteResource::collection($pacientes)
        ], 200);
    }

    public function store(StorePacienteRequest $request): JsonResponse
    {
        try {
            $paciente = Paciente::create($request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Paciente creado correctamente.',
                'data' => new PacienteResource($paciente)
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear paciente: ' . $e->getMessage()], 500);
        }
    }

    public function show(Paciente $paciente): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Detalle del paciente recuperado.',
            'data' => new PacienteResource($paciente)
        ], 200);
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente): JsonResponse
    {
        try {
            $paciente->update($request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Paciente actualizado correctamente.',
                'data' => new PacienteResource($paciente)
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar paciente.'], 500);
        }
    }

    public function destroy(Paciente $paciente): JsonResponse
    {
        try {
            $paciente->delete();
            return response()->json([
                'success' => true,
                'message' => 'Paciente eliminado correctamente.',
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar paciente. Es posible que tenga citas asociadas.'], 500);
        }
    }
}