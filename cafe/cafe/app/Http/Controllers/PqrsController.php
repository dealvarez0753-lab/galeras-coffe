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

    Pqrs::create([
        'nombre' => $request->nombres,
        'apellido' => $request->apellidos,
        'correo' => $request->correo,
        'tipo' => $request->tipo,
        'mensaje' => $request->mensaje,
        'estado' => $request->has('acepto')
    ]);
    return redirect()->route('nosotros')->with('success', 'Mensaje guardado correctamente');
}


public function index(){
    $mensajes = Pqrs:: orderBy('id','desc')->get();
    return view('mensaje', compact('mensajes'));
    
}
}