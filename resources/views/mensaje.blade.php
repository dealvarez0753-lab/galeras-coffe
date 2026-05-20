@extends('layouts.app')
@section('title', 'Mensajes')
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
        max-width: 1100px; margin: 0 auto;
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
        background: #fafafa; padding: 14px 20px; font-size: 12px;
        font-weight: 700; color: #888; text-transform: uppercase;
        letter-spacing: 0.8px; border-bottom: 1px solid #f0f0f0; text-align: left;
    }
    .gc-table tbody tr { border-bottom: 1px solid #f8f8f8; transition: background .15s; }
    .gc-table tbody tr:hover { background: #fffdf5; }
    .gc-table tbody tr:last-child { border-bottom: none; }
    .gc-table td { padding: 14px 20px; font-size: 14px; color: #444; vertical-align: middle; }
    .tipo-badge {
        display: inline-block; font-size: 12px; font-weight: 600;
        padding: 3px 12px; border-radius: 10px;
    }
    .tipo-queja       { background: #fde8e8; color: #c0392b; }
    .tipo-peticion    { background: #e8f0fe; color: #1967d2; }
    .tipo-felicitacion{ background: #e6f9ee; color: #1e7e34; }
</style>

<section class="tabla-hero">
    <h1>Mensajes <span>Recibidos</span> 📬</h1>
    <p>Panel de gestión de PQRS — Galeras Coffe</p>
</section>

<section class="tabla-section">
    <div class="tabla-card">
        <div class="tabla-header">
            <h2>📋 Todos los mensajes</h2>
            <span class="badge-count">{{ count($mensajes) }} registros</span>
        </div>
        <div style="overflow-x:auto;">
            <table class="gc-table">
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
                            <td><strong>#{{ $mensaje->id }}</strong></td>
                            <td>{{ $mensaje->nombre }}</td>
                            <td>{{ $mensaje->apellido }}</td>
                            <td style="color:#f8961e;">{{ $mensaje->correo }}</td>
                            <td>
                                @if($mensaje->tipo == 'Queja')
                                    <span class="tipo-badge tipo-queja">😤 Queja</span>
                                @elseif($mensaje->tipo == 'Petición')
                                    <span class="tipo-badge tipo-peticion">🙏 Petición</span>
                                @else
                                    <span class="tipo-badge tipo-felicitacion">🎉 Felicitación</span>
                                @endif
                            </td>
                            <td style="max-width:250px; color:#777;">{{ $mensaje->mensaje }}</td>
                           {{-- ACCIONES --}}
<td>
    <a href="{{ route('mensajes.edit', $mensaje->id) }}"
        style="background:#f9c74f; color:#1a1a2e; border:none; padding:6px 14px; border-radius:20px; font-size:12px; font-weight:700; text-decoration:none; margin-right:6px; display:inline-block;">
        Editar
    </a>
    <form action="{{ route('mensajes.destroy', $mensaje->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit"
            style="background:#e63946; color:#fff; border:none; padding:6px 14px; border-radius:20px; font-size:12px; font-weight:700; cursor:pointer;"
            onclick="return confirm('¿Seguro que deseas eliminar este mensaje?')">
           Eliminar
        </button>
    </form>
</td>
                                </button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection