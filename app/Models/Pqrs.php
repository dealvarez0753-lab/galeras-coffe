<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pqrs extends Model
{
    protected $fillable = [
    'nombre',
    'apellido',
    'correo',
    'tipo',
    'mensaje',
    'estado'
];
}
