@extends('layouts.app')

@section('title', 'Nosotros')

@section('content')
<div style="background-color:#f5e6d3; padding:30px; border-radius:10px;">
<h2 class="text-center mb-4">Sobre Nosotros ☕</h2>

<p class="text-center">
    Somos una empresa comprometida con la calidad del servicio y la atención al cliente. 🤝
</p>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<hr class="my-5">

<h3 class="text-center mb-4">Formulario PQRS</h3>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow p-4">
            <form action="{{ route('pqrs.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}">
                    </div>
                </div>

                <div class="mb-3">
                    
                    <label>Correo electrónico</label>
                    <input type="email" name="correo" class="form-control" value="{{ old('correo') }}">
                </div>

                <div class="mb-3">
                    <label>Tipo de solicitud</label>
                    <select name="tipo" class="form-select">
                        <option value="">Seleccione una opción</option>
                        <option value="Queja">Queja</option>
                        <option value="Petición">Petición</option>
                        <option value="Felicitación">Felicitación</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Mensaje</label>
                    <textarea name="mensaje" class="form-control" rows="4">{{ old('mensaje') }}</textarea>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="acepto" class="form-check-input" id="acepto">
                    <label class="form-check-label" for="acepto">Acepto términos y condiciones</label>
                </div>

                <button type="submit" class="btn btn-dark w-100">Enviar</button>
            </form>
        </div>
    </div>
</div>