<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'dni' => 'required|string|size:8|unique:pacientes,dni',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'required|date|before:today',
        ];
    }
}