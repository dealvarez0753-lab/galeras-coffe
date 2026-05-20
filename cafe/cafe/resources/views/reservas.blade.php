@extends('layouts.app')

@section('title', 'Reservas')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div style="background-color:#f5e6d3; padding:30px; border-radius:10px; min-height: 100vh;">
    <h2 class="text-center mb-4">Reserva tu Mesa ☕</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <form action="{{ route('reservas.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Nombres</label>
                            <input type="text" name="nombres" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Teléfono</label>
                        <input type="tel" name="telefono" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                        <label class="fw-bold">Bebida</label>
                        <select name="bebida" class="form-select">
                            <option value="">Seleccione...</option>
                            <option value="Capuchino">Capuchino</option>
                            <option value="Americano-Colombiano">Americano-Colombiano</option>
                            <option value="Frappuccino">Frappuccino</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Fecha</label>
                            <input type="date" id="fechaReserva" name="fecha" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Hora</label>
                            <input type="time" name="hora" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold">Número de Personas</label>
                        <select name="personas" class="form-select" required>
                            <option value="">Seleccione...</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'persona' : 'personas' }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold">Notas</label>
                        <textarea name="notas" class="form-control" rows="3" placeholder="Cuéntanos tu experiencia"></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Confirmar Reserva</button>
                </form>
            </div>
            </div>
    </div>
</div>