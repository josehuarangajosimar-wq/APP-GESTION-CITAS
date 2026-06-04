<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CitaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'paciente' => $this->whenLoaded('paciente', function () {
                return $this->paciente->nombre . ' ' . $this->paciente->apellido;
            }),
            'medico' => $this->whenLoaded('medico', function () {
                return 'Dr(a). ' . $this->medico->apellido . ' (' . $this->medico->especialidad . ')';
            }),
            'fecha' => Carbon::parse($this->fecha_hora)->format('d/m/Y'),
            'hora' => Carbon::parse($this->fecha_hora)->format('h:i A'),
            'estado' => ucfirst($this->estado),
        ];
    }
}