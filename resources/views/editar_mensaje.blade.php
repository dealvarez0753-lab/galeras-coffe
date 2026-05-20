@extends('layouts.app')
@section('title', 'Editar Mensaje')
@section('content')

<style>
    .edit-hero {
        background: linear-gradient(135deg, #1a1a2e, #0f3460);
        padding: 50px 2rem; text-align: center;
    }
    .edit-hero h1 { font-size: 32px; font-weight: 700; color: #fff; margin-bottom: 8px; }
    .edit-hero h1 span { color: #f9c74f; }
    .edit-hero p { color: #aaa; font-size: 15px; }

    .edit-section { padding: 48px 2rem; background: #f8f9fa; }
    .edit-card {
        background: #fff; border-radius: 24px; border: 1px solid #eee;
        padding: 40px; box-shadow: 0 8px 40px rgba(0,0,0,0.06);
        max-width: 680px; margin: 0 auto;
    }
    .gc-label { font-size: 14px; font-weight: 600; color: #1a1a2e; margin-bottom: 6px; display: block; }
    .gc-input {
        width: 100%; padding: 12px 16px; border: 1.5px solid #e0e0e0;
        border-radius: 12px; font-size: 15px; outline: none; background: #fafafa;
        transition: border-color .2s;
    }
    .gc-input:focus { border-color: #f9c74f; background: #fff; }
    .gc-select {
        width: 100%; padding: 12px 16px; border: 1.5px solid #e0e0e0;
        border-radius: 12px; font-size: 15px; background: #fafafa;
        outline: none; transition: border-color .2s; appearance: none;
    }
    .gc-select:focus { border-color: #f9c74f; background: #fff; }
    .gc-textarea {
        width: 100%; padding: 12px 16px; border: 1.5px solid #e0e0e0;
        border-radius: 12px; font-size: 15px; background: #fafafa;
        outline: none; transition: border-color .2s; resize: vertical;
    }
    .gc-textarea:focus { border-color: #f9c74f; background: #fff; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .mb-gc { margin-bottom: 20px; }
    @media (max-width: 600px) { .form-row { grid-template-columns: 1fr; } }
    .btn-submit {
        width: 100%; background: linear-gradient(135deg, #f9c74f, #f8961e);
        color: #1a1a2e; border: none; padding: 15px; border-radius: 14px;
        font-size: 16px; font-weight: 700; cursor: pointer;
        transition: transform .2s, box-shadow .2s; margin-top: 8px;
    }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(249,199,79,0.4); }
    .btn-cancel {
        display: block; text-align: center; margin-top: 14px;
        color: #888; font-size: 14px; text-decoration: none;
    }
    .btn-cancel:hover { color: #e63946; }
    .alert-gc-danger {
        background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;
        border-radius: 12px; padding: 14px 20px; margin-bottom: 20px; font-size: 14px;
    }
    .alert-gc-danger ul { margin: 0; padding-left: 18px; }
</style>

<section class="edit-hero">
    <h1>Editar <span>Mensaje</span> ✏️</h1>
    <p>Modifica los datos del mensaje #{{ $mensaje->id }}</p>
</section>

<section class="edit-section">

    @if($errors->any())
        <div class="alert-gc-danger" style="max-width:680px; margin: 0 auto 20px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="edit-card">
        <form action="{{ route('mensajes.update', $mensaje->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row mb-gc">
                <div>
                    <label class="gc-label">Nombre</label>
                    <input type="text" name="nombre" class="gc-input"
                        value="{{ old('nombre', $mensaje->nombre) }}" placeholder="Nombre">
                </div>
                <div>
                    <label class="gc-label">Apellido</label>
                    <input type="text" name="apellido" class="gc-input"
                        value="{{ old('apellido', $mensaje->apellido) }}" placeholder="Apellido">
                </div>
            </div>

            <div class="mb-gc">
                <label class="gc-label">Correo electrónico</label>
                <input type="email" name="correo" class="gc-input"
                    value="{{ old('correo', $mensaje->correo) }}" placeholder="tucorreo@email.com">
            </div>

            <div class="mb-gc">
                <label class="gc-label">Tipo de solicitud</label>
                <select name="tipo" class="gc-select">
                    <option value="Queja"        {{ old('tipo', $mensaje->tipo) == 'Queja' ? 'selected' : '' }}>😤 Queja</option>
                    <option value="Petición"     {{ old('tipo', $mensaje->tipo) == 'Petición' ? 'selected' : '' }}>🙏 Petición</option>
                    <option value="Felicitación" {{ old('tipo', $mensaje->tipo) == 'Felicitación' ? 'selected' : '' }}>🎉 Felicitación</option>
                </select>
            </div>

            <div class="mb-gc">
                <label class="gc-label">Mensaje</label>
                <textarea name="mensaje" class="gc-textarea" rows="4"
                    placeholder="Escribe el mensaje...">{{ old('mensaje', $mensaje->mensaje) }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Guardar cambios ✅</button>
            <a href="{{ route('mensajes') }}" class="btn-cancel">← Volver a mensajes</a>
        </form>
    </div>
</section>

@endsection