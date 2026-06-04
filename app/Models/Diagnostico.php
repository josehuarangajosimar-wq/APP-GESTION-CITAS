<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        'cita_id',
        'descripcion',
        'nivel_gravedad'
    ];

    public function cita(): BelongsTo
    {
        return $this->belongsTo(Cita::class);
    }

    public function tratamientos(): HasMany
    {
        return $this->hasMany(Tratamiento::class);
    }
}