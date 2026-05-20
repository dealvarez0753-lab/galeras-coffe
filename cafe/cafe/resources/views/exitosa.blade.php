@extends('layouts.app')

@section('title', 'Exitosa')

@section('content')
<h2 class="text-center mb-4">Reserva exitosa</h2>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Bebida</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Numero de personas</th>
            <th>Notas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($exitosas as $exitosa)
            <tr>
                <td>{{$exitosa->id}}</td>
                <td>{{$exitosa->nombres}}</td>
                <td>{{$exitosa->apellidos}}</td>
                <td>{{$exitosa->telefono}}</td>
                <td>{{$exitosa->bebida}}</td>
                <td>{{$exitosa->fecha}}</td>
                <td>{{$exitosa->hora}}</td>
                <td>{{$exitosa->numero_de_personas}}</td>
                <td>{{$exitosa->notas}}</td>
            </tr>
        @endforeach
    </tbody>
</table>