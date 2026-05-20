@extends('layouts.app')

@section('title', 'Mensajes')

@section('content')
<h2 class="text-center mb-4">Mensajes recibidos</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Tipo</th>
            <th>Mensaje</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mensajes as $mensaje)
            <tr>
                <td>{{$mensaje->id}}</td>
                <td>{{$mensaje->nombre}}</td>
                <td>{{$mensaje->apellido}}</td>
                <td>{{$mensaje->correo}}</td>
                <td>{{$mensaje->tipo}}</td>
                <td>{{$mensaje->mensaje}}</td>
            </tr>
        @endforeach
    </tbody>
</table>