<?php

namespace App\Http\Controllers;

use App\Models\Pqrs;
use Illuminate\Http\Request;

class PqrsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombres'  => 'required|string|max:100',
            'apellidos'=> 'required|string|max:100',
            'correo'   => 'required|email',
            'tipo'     => 'required|in:Queja,Petición,Felicitación',
            'mensaje'  => 'required|string|max:1000',
            'acepto'   => 'accepted'
        ]);

        Pqrs::create([
            'nombre'  => $request->nombres,
            'apellido'=> $request->apellidos,
            'correo'  => $request->correo,
            'tipo'    => $request->tipo,
            'mensaje' => $request->mensaje,
            'estado'  => $request->has('acepto')
        ]);

        return redirect()->route('nosotros')->with('success', 'Mensaje guardado correctamente');
    }

    public function index()
    {
        $mensajes = Pqrs::orderBy('id', 'desc')->get();
        return view('mensaje', compact('mensajes'));
    }

    public function edit($id)
    {
        $mensaje = Pqrs::findOrFail($id);
        return view('editar_mensaje', compact('mensaje'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'correo'   => 'required|email',
            'tipo'     => 'required|in:Queja,Petición,Felicitación',
            'mensaje'  => 'required|string|max:1000',
        ]);

        $pqrs = Pqrs::findOrFail($id);
        $pqrs->update([
            'nombre'   => $request->nombre,
            'apellido' => $request->apellido,
            'correo'   => $request->correo,
            'tipo'     => $request->tipo,
            'mensaje'  => $request->mensaje,
        ]);

        return redirect()->route('mensajes')->with('success', 'Mensaje actualizado correctamente');
    }

    public function destroy($id)
    {
        $pqrs = Pqrs::findOrFail($id);
        $pqrs->delete();

        return redirect()->route('mensajes')->with('success', 'Mensaje eliminado correctamente');
    }
}