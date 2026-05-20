<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $fillable = [
        'nombres', 
        'apellidos', 
        'telefono', 
        'bebida', 
        'fecha', 
        'hora', 
        'numero_de_personas', 
        'notas'
    ];
}

