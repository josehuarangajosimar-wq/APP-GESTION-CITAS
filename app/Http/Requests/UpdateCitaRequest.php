<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paciente_id' => 'sometimes|required|integer|exists:pacientes,id',
            'medico_id' => 'sometimes|required|integer|exists:medicos,id',
            'fecha_hora' => 'sometimes|required|date',
            'estado' => 'sometimes|required|in:pendiente,completada,cancelada',
        ];
    }
}