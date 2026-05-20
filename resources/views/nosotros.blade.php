@extends('layouts.app')
@section('title', 'Nosotros')
@section('content')

<style>
    .nosotros-hero {
        background: linear-gradient(135deg, #1a1a2e, #0f3460);
        padding: 70px 2rem; text-align: center;
    }
    .nosotros-hero h1 { font-size: 38px; font-weight: 700; color: #fff; margin-bottom: 12px; }
    .nosotros-hero h1 span { color: #f9c74f; }
    .nosotros-hero p { color: #aaa; font-size: 16px; max-width: 520px; margin: 0 auto; line-height: 1.7; }

    .about-section { padding: 64px 2rem; background: #f8f9fa; }
    .section-title { font-size: 28px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; text-align: center; }
    .section-sub { color: #888; font-size: 15px; text-align: center; margin-bottom: 44px; }
    .about-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px; max-width: 900px; margin: 0 auto;
    }
    .about-card {
        background: #fff; border-radius: 20px; padding: 32px 24px; text-align: center;
        border: 1px solid #eee; transition: transform .2s, box-shadow .2s;
    }
    .about-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,0.08); }
    .about-icon { font-size: 40px; margin-bottom: 16px; display: block; }
    .about-card h3 { font-size: 17px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; }
    .about-card p { color: #888; font-size: 14px; line-height: 1.6; margin: 0; }

    .pqrs-section { padding: 64px 2rem; background: #fff; }
    .pqrs-wrapper { max-width: 680px; margin: 0 auto; }
    .pqrs-card {
        background: #fff; border-radius: 24px; border: 1px solid #eee;
        padding: 40px; box-shadow: 0 8px 40px rgba(0,0,0,0.06);
    }
    .gc-label { font-size: 14px; font-weight: 600; color: #1a1a2e; margin-bottom: 6px; display: block; }
    .gc-input {
        width: 100%; padding: 11px 16px; border: 1.5px solid #e0e0e0;
        border-radius: 12px; font-size: 15px; transition: border-color .2s;
        outline: none; background: #fafafa;
    }
    .gc-input:focus { border-color: #f9c74f; background: #fff; }
    .gc-select {
        width: 100%; padding: 11px 16px; border: 1.5px solid #e0e0e0;
        border-radius: 12px; font-size: 15px; background: #fafafa;
        outline: none; transition: border-color .2s; appearance: none;
    }
    .gc-select:focus { border-color: #f9c74f; background: #fff; }
    .gc-textarea {
        width: 100%; padding: 11px 16px; border: 1.5px solid #e0e0e0;
        border-radius: 12px; font-size: 15px; background: #fafafa;
        outline: none; transition: border-color .2s; resize: vertical;
    }
    .gc-textarea:focus { border-color: #f9c74f; background: #fff; }
    .gc-check-label { display: flex; align-items: center; gap: 10px; font-size: 14px; color: #555; cursor: pointer; }
    .gc-check-label input { width: 18px; height: 18px; accent-color: #f9c74f; }
    .btn-submit {
        width: 100%; background: linear-gradient(135deg, #f9c74f, #f8961e);
        color: #1a1a2e; border: none; padding: 15px; border-radius: 14px;
        font-size: 16px; font-weight: 700; cursor: pointer;
        transition: transform .2s, box-shadow .2s; margin-top: 8px;
    }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(249,199,79,0.4); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .mb-gc { margin-bottom: 20px; }
    @media (max-width: 600px) { .form-row { grid-template-columns: 1fr; } }

    .alert-gc-success {
        background: #d4edda; color: #155724; border: 1px solid #c3e6cb;
        border-radius: 12px; padding: 14px 20px; margin-bottom: 20px; font-size: 14px;
    }
    .alert-gc-danger {
        background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;
        border-radius: 12px; padding: 14px 20px; margin-bottom: 20px; font-size: 14px;
    }
    .alert-gc-danger ul { margin: 0; padding-left: 18px; }
</style>

<section class="nosotros-hero">
    <h1>Sobre <span>Nosotros</span> ☕</h1>
    <p>Somos una empresa comprometida con la calidad del servicio y la atención al cliente, llevando el mejor café de Colombia a tu mesa. 🤝</p>
</section>

<section class="pqrs-section">
    <div class="pqrs-wrapper">
        <p class="section-title">Formulario PQRS 📋</p>
        <p class="section-sub">Tu opinión nos ayuda a mejorar cada día</p>

        @if(session('success'))
            <div class="alert-gc-success">✅ {{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-gc-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="pqrs-card">
            <form action="{{ route('pqrs.store') }}" method="POST">
                @csrf
                <div class="form-row mb-gc">
                    <div>
                        <label class="gc-label">Nombres</label>
                        <input type="text" name="nombres" class="gc-input" value="{{ old('nombres') }}" placeholder="Tu nombre">
                    </div>
                    <div>
                        <label class="gc-label">Apellidos</label>
                        <input type="text" name="apellidos" class="gc-input" value="{{ old('apellidos') }}" placeholder="Tu apellido">
                    </div>
                </div>
                <div class="mb-gc">
                    <label class="gc-label">Correo electrónico</label>
                    <input type="email" name="correo" class="gc-input" value="{{ old('correo') }}" placeholder="tucorreo@email.com">
                </div>
                <div class="mb-gc">
                    <label class="gc-label">Tipo de solicitud</label>
                    <select name="tipo" class="gc-select">
                        <option value="">Seleccione una opción</option>
                        <option value="Queja" {{ old('tipo') == 'Queja' ? 'selected' : '' }}>😤 Queja</option>
                        <option value="Petición" {{ old('tipo') == 'Petición' ? 'selected' : '' }}>🙏 Petición</option>
                        <option value="Felicitación" {{ old('tipo') == 'Felicitación' ? 'selected' : '' }}>🎉 Felicitación</option>
                    </select>
                </div>
                <div class="mb-gc">
                    <label class="gc-label">Mensaje</label>
                    <textarea name="mensaje" class="gc-textarea" rows="4" placeholder="Escribe tu mensaje aquí...">{{ old('mensaje') }}</textarea>
                </div>
                <div class="mb-gc">
                    <label class="gc-check-label">
                        <input type="checkbox" name="acepto" id="acepto">
                        Acepto los términos y condiciones
                    </label>
                </div>
                <button type="submit" class="btn-submit">Enviar mensaje ✉️</button>
            </form>
        </div>
    </div>
</section>

@endsection