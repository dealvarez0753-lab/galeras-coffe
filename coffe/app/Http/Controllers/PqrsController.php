<?php

namespace App\Http\Controllers;

use App\Models\Pqrs;
use Illuminate\Http\Request;

class PqrsController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'nombres' => 'required|string|max:100',
        'apellidos' => 'required|string|max:100',
        'correo' => 'required|email',
        'tipo' => 'required|in:Queja,Petición,Felicitación',
        'acepto' => 'accepted'
    ]);

    Pqrs::created([
        'nombre' => $request->nombres,
        'apellido' => $request->apellidos,
        'correo' => $request->correo,
        'tipo' => $request->tipo,
        'mensaje' => $request->mensaje,
        'acepto' => $request->has('acepto')
    ]);
    return redirect()->route('nosotros')->with('success', 'Mensaje guardado correctamente');
}
}