@extends('layouts.app')
@section('title', 'Reservas')
@section('content')

<style>
    .reservas-hero {
        background: linear-gradient(135deg, #1a1a2e, #0f3460);
        padding: 70px 2rem; text-align: center;
    }
    .reservas-hero h1 { font-size: 38px; font-weight: 700; color: #fff; margin-bottom: 12px; }
    .reservas-hero h1 span { color: #f9c74f; }
    .reservas-hero p { color: #aaa; font-size: 16px; max-width: 500px; margin: 0 auto; line-height: 1.7; }

    .reservas-section { padding: 64px 2rem; background: #f8f9fa; }
    .section-title { font-size: 28px; font-weight: 700; color: #1a1a2e; text-align: center; margin-bottom: 8px; }
    .section-sub { color: #888; font-size: 15px; text-align: center; margin-bottom: 40px; }
    .form-wrapper { max-width: 680px; margin: 0 auto; }
    .form-card {
        background: #fff; border-radius: 24px; border: 1px solid #eee;
        padding: 40px; box-shadow: 0 8px 40px rgba(0,0,0,0.06);
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
        color: #1a1a2e; border: none; padding: 16px; border-radius: 14px;
        font-size: 16px; font-weight: 700; cursor: pointer;
        transition: transform .2s, box-shadow .2s; margin-top: 8px;
    }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(249,199,79,0.4); }

    .form-divider {
        font-size: 12px; font-weight: 700; color: #bbb;
        text-transform: uppercase; letter-spacing: 1px;
        display: flex; align-items: center; gap: 12px;
        margin: 28px 0 20px;
    }
    .form-divider::before, .form-divider::after { content: ''; flex: 1; height: 1px; background: #f0f0f0; }

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

<section class="reservas-hero">
    <h1>Reserva tu <span>Mesa</span> ☕</h1>
    <p>Asegura tu lugar en Galeras Coffe y disfruta de una experiencia única. ¡Te esperamos!</p>
</section>

<section class="reservas-section">
    <div class="form-wrapper">
        <p class="section-title">Completa tu reserva 📅</p>
        <p class="section-sub">Solo toma unos segundos, ¡te lo prometemos!</p>

        @if($errors->any())
            <div class="alert-gc-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert-gc-success">✅ {{ session('success') }}</div>
        @endif

        <div class="form-card">
            <form action="{{ route('reservas.store') }}" method="POST">
                @csrf

                <div class="form-divider">Datos personales</div>

                <div class="form-row mb-gc">
                    <div>
                        <label class="gc-label">Nombres</label>
                        <input type="text" name="nombres" class="gc-input" placeholder="Tu nombre">
                    </div>
                    <div>
                        <label class="gc-label">Apellidos</label>
                        <input type="text" name="apellidos" class="gc-input" placeholder="Tu apellido">
                    </div>
                </div>

                <div class="mb-gc">
                    <label class="gc-label">Teléfono</label>
                    <input type="tel" name="telefono" class="gc-input" placeholder="+57 300 000 0000">
                </div>

                <div class="form-divider">Detalles de la reserva</div>

                <div class="mb-gc">
                    <label class="gc-label">Bebida de preferencia</label>
                    <select name="bebida" class="gc-select">
                        <option value="">Seleccione una bebida...</option>
                        <option value="Capuchino">☕ Capuchino</option>
                        <option value="Americano-Colombiano">☕ Americano Colombiano</option>
                        <option value="Frappuccino">🧋 Frappuccino</option>
                    </select>
                </div>

                <div class="form-row mb-gc">
                    <div>
                        <label class="gc-label">Fecha</label>
                        <input type="date" name="fecha" class="gc-input" required>
                    </div>
                    <div>
                        <label class="gc-label">Hora</label>
                        <input type="time" name="hora" class="gc-input" required>
                    </div>
                </div>

                <div class="mb-gc">
                    <label class="gc-label">Número de personas</label>
                    <select name="personas" class="gc-select" required>
                        <option value="">Seleccione...</option>
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'persona' : 'personas' }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-gc">
                    <label class="gc-label">Notas adicionales</label>
                    <textarea name="notas" class="gc-textarea" rows="3" placeholder="¿Alguna petición especial? Cuéntanos..."></textarea>
                </div>

                <button type="submit" class="btn-submit">Confirmar Reserva</button>
            </form>
        </div>
    </div>
</section>

@endsection