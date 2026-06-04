<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnostico_id',
        'instrucciones',
        'duracion_dias'
    ];

    public function diagnostico(): BelongsTo
    {
        return $this->belongsTo(Diagnostico::class);
    }

    // Relación Muchos a Muchos con tabla pivote
    public function medicamentos(): BelongsToMany
    {
        return $this->belongsToMany(Medicamento::class, 'medicamento_tratamiento')
                    ->withPivot('dosis', 'frecuencia')
                    ->withTimestamps();
    }
}