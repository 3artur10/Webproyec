<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sacramento extends Model
{
    // Requisito: Uso de $fillable para permitir el registro de datos [cite: 38]
    protected $fillable = ['nombre'];

    /**
     * Relación: Un sacramento tiene muchos jóvenes inscritos.
     */
    public function inscritos(): HasMany
    {
        return $this->hasMany(Inscrito::class);
    }
}