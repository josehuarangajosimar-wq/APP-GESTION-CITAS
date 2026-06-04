<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCitaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paciente_id' => 'required|integer|exists:pacientes,id',
            'medico_id' => 'required|integer|exists:medicos,id',
            'fecha_hora' => 'required|date|after:now',
            'estado' => 'nullable|in:pendiente,completada,cancelada',
        ];
    }
}