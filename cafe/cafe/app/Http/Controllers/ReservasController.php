<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nombres' => 'required|string|max:100',
        'apellidos' => 'required|string|max:100',
        'telefono' => 'required|numeric',
        'bebida' => 'required|in:Capuchino,Americano-Colombiano,Frappuccino',
        'fecha' => 'required|date',
        'hora' => 'required',
        'personas' =>'required|integer|min:1|max:10',
        'notas' => 'required|string|max:500',
    ]);

    

    Reservas::create([
        'nombres' => $request->nombres,
        'apellidos' => $request->apellidos,
        'telefono' => $request->telefono,
        'bebida' => $request->bebida,
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'numero_de_personas' => $request->personas,
        'notas' => $request->notas
    ]);
    return redirect()->route('reservas')->with('success', 'Reserva guardada exitosamente');
}


public function index(){
    $exitosas = Reservas:: orderBy('id','desc')->get();
    return view('exitosa', compact('exitosas'));
    
}
}
