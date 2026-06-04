<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('paciente')->id ?? $this->route('paciente');
        
        return [
            'nombre' => 'sometimes|required|string|max:100',
            'apellido' => 'sometimes|required|string|max:100',
            'dni' => 'sometimes|required|string|size:8|unique:pacientes,dni,' . $id,
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'sometimes|required|date|before:today',
        ];
    }
}