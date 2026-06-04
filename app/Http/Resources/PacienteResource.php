<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacienteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre_completo' => $this->nombre . ' ' . $this->apellido,
            'documento_identidad' => $this->dni,
            'contacto' => $this->telefono ?? 'No registrado',
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'registrado_el' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}