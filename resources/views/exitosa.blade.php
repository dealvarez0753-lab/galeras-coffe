@extends('layouts.app')
@section('title', 'Reservas Registradas')
@section('content')

<style>
    .tabla-hero {
        background: linear-gradient(135deg, #1a1a2e, #0f3460);
        padding: 50px 2rem; text-align: center;
    }
    .tabla-hero h1 { font-size: 32px; font-weight: 700; color: #fff; margin-bottom: 8px; }
    .tabla-hero h1 span { color: #f9c74f; }
    .tabla-hero p { color: #aaa; font-size: 15px; }

    .tabla-section { padding: 48px 2rem; background: #f8f9fa; }
    .tabla-card {
        background: #fff; border-radius: 20px; border: 1px solid #eee;
        overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.05);
        max-width: 1200px; margin: 0 auto;
    }
    .tabla-header {
        padding: 20px 28px; border-bottom: 1px solid #f0f0f0;
        display: flex; align-items: center; justify-content: space-between;
    }
    .tabla-header h2 { font-size: 18px; font-weight: 700; color: #1a1a2e; margin: 0; }
    .badge-count {
        background: rgba(249,199,79,0.15); color: #f8961e;
        font-size: 13px; font-weight: 600; padding: 4px 14px; border-radius: 20px;
    }
    .gc-table { width: 100%; border-collapse: collapse; }
    .gc-table thead th {
        background: #fafafa; padding: 14px 16px; font-size: 12px;
        font-weight: 700; color: #888; text-transform: uppercase;
        letter-spacing: 0.8px; border-bottom: 1px solid #f0f0f0;
        text-align: left; white-space: nowrap;
    }
    .gc-table tbody tr { border-bottom: 1px solid #f8f8f8; transition: background .15s; }
    .gc-table tbody tr:hover { background: #fffdf5; }
    .gc-table tbody tr:last-child { border-bottom: none; }
    .gc-table td { padding: 13px 16px; font-size: 14px; color: #444; vertical-align: middle; white-space: nowrap; }
    .bebida-badge {
        display: inline-block; font-size: 12px; font-weight: 600;
        padding: 3px 12px; border-radius: 10px;
        background: #fff8e1; color: #e65100;
    }
    .personas-badge {
        display: inline-block; font-size: 12px; font-weight: 600;
        padding: 3px 12px; border-radius: 10px;
        background: #e8f0fe; color: #1967d2;
    }
</style>

<section class="tabla-hero">
    <h1>Reservas <span>Registradas</span> 📅</h1>
    <p>Panel de gestión de reservas — Galeras Coffe</p>
</section>

<section class="tabla-section">
    <div class="tabla-card">
        <div class="tabla-header">
            <h2>🗓️ Todas las reservas</h2>
            <span class="badge-count">{{ count($exitosas) }} registros</span>
        </div>
        <div style="overflow-x:auto;">
            <table class="gc-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Bebida</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Personas</th>
                        <th>Notas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exitosas as $exitosa)
                        <tr>
                            <td><strong>#{{ $exitosa->id }}</strong></td>
                            <td>{{ $exitosa->nombres }}</td>
                            <td>{{ $exitosa->apellidos }}</td>
                            <td style="color:#f8961e;">{{ $exitosa->telefono }}</td>
                            <td><span class="bebida-badge">☕ {{ $exitosa->bebida }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($exitosa->fecha)->format('d/m/Y') }}</td>
                            <td>{{ $exitosa->hora }}</td>
                            <td><span class="personas-badge">👥 {{ $exitosa->numero_de_personas }}</span></td>
                            <td style="color:#777; max-width:200px;">{{ $exitosa->notas }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection