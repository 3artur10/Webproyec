<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    // Campos que permitiremos rellenar desde los formularios
    protected $fillable = ['dia', 'hora', 'descripcion'];
}