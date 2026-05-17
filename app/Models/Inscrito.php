<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscrito extends Model
{
    // Requisito: Campos permitidos para carga masiva [cite: 38]
    protected $fillable = [
        'nombre_joven', 
        'nombre_responsable', 
        'dui', 
        'telefono', 
        'edad', 
        'sacramento_id'
    ];

    /**
     * Relación: El inscrito pertenece a un sacramento específico.
     */
    public function sacramento(): BelongsTo
    {
        return $this->belongsTo(Sacramento::class);
    }
}