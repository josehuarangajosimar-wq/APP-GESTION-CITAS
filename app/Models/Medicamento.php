<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'concentracion',
        'presentacion'
    ];

    public function tratamientos(): BelongsToMany
    {
        return $this->belongsToMany(Tratamiento::class, 'medicamento_tratamiento')
                    ->withPivot('dosis', 'frecuencia')
                    ->withTimestamps();
    }
}