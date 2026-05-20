@extends('layouts.app')
@section('title', 'Inicio')
@section('content')

<style>
    .hero {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        padding: 90px 2rem 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .hero::before {
        content: '';
        position: absolute;
        top: -80px; right: -80px;
        width: 350px; height: 350px;
        border-radius: 50%;
        border: 70px solid rgba(249,199,79,0.06);
        pointer-events: none;
    }
    .hero::after {
        content: '';
        position: absolute;
        bottom: -100px; left: -100px;
        width: 400px; height: 400px;
        border-radius: 50%;
        border: 80px solid rgba(248,150,30,0.05);
        pointer-events: none;
    }
    .hero-badge {
        display: inline-block;
        background: rgba(249,199,79,0.12);
        color: #f9c74f;
        border: 1px solid rgba(249,199,79,0.3);
        font-size: 12px; font-weight: 600;
        padding: 6px 20px; border-radius: 20px;
        margin-bottom: 24px; letter-spacing: 1.5px;
        text-transform: uppercase;
    }
    .hero h1 { font-size: 44px; font-weight: 700; color: #fff; margin-bottom: 20px; line-height: 1.2; }
    .hero h1 span { color: #f9c74f; }
    .hero p { color: #aaa; font-size: 17px; max-width: 580px; margin: 0 auto 40px; line-height: 1.8; }
    .hero-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
    .btn-gc-primary {
        background: #f9c74f; color: #1a1a2e;
        border: none; padding: 14px 34px;
        border-radius: 25px; font-size: 15px;
        font-weight: 700; text-decoration: none;
        transition: transform .2s, box-shadow .2s; display: inline-block;
    }
    .btn-gc-primary:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(249,199,79,0.4); color: #1a1a2e; }
    .btn-gc-outline {
        background: transparent; color: #fff;
        border: 1.5px solid rgba(255,255,255,0.25);
        padding: 14px 34px; border-radius: 25px;
        font-size: 15px; text-decoration: none;
        transition: all .2s; display: inline-block;
    }
    .btn-gc-outline:hover { background: rgba(255,255,255,0.08); color: #fff; }

    .features { padding: 72px 2rem; background: #f8f9fa; }
    .section-title { text-align: center; font-size: 30px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; }
    .section-sub { text-align: center; color: #888; margin-bottom: 44px; font-size: 15px; }
    .features-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 24px; max-width: 920px; margin: 0 auto;
    }
    .feature-card {
        background: #fff; border-radius: 20px;
        padding: 34px 24px; text-align: center;
        border: 1px solid #eee; transition: transform .2s, box-shadow .2s;
    }
    .feature-card:hover { transform: translateY(-5px); box-shadow: 0 14px 40px rgba(0,0,0,0.08); }
    .feature-icon { width: 68px; height: 68px; border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 32px; }
    .fi-yellow { background: #fff8e1; }
    .fi-pink   { background: #fce4ec; }
    .fi-purple { background: #ede7f6; }
    .fi-teal   { background: #e0f2f1; }
    .feature-card h3 { font-size: 17px; font-weight: 600; color: #1a1a2e; margin-bottom: 10px; }
    .feature-card p { color: #888; font-size: 14px; line-height: 1.6; margin: 0; }

    .video-section { padding: 72px 2rem; background: #fff; text-align: center; }
    .video-wrapper { max-width: 720px; margin: 0 auto; border-radius: 24px; overflow: hidden; box-shadow: 0 24px 70px rgba(0,0,0,0.13); }
    .video-wrapper iframe { width: 100%; height: 390px; border: none; display: block; }

    .cta-section { background: linear-gradient(135deg, #f9c74f, #f8961e); padding: 72px 2rem; text-align: center; }
    .cta-section h2 { font-size: 34px; font-weight: 700; color: #1a1a2e; margin-bottom: 14px; }
    .cta-section p { color: rgba(26,26,46,0.7); font-size: 16px; margin-bottom: 32px; }
    .btn-gc-dark {
        background: #1a1a2e; color: #f9c74f;
        border: none; padding: 16px 40px;
        border-radius: 25px; font-size: 16px;
        font-weight: 700; text-decoration: none;
        transition: transform .2s; display: inline-block;
    }
    .btn-gc-dark:hover { transform: translateY(-3px); color: #f9c74f; }
</style>

<section class="hero">
    <div class="hero-badge">☕ Pasto, Nariño — Colombia</div>
    <h1>Bienvenidos a<br><span>Galeras Coffe</span> 🌋</h1>
    <p>Un rincón lleno de aromas donde el café recién preparado se mezcla con momentos de tranquilidad. Cada sorbo inspira, cada visita se convierte en un recuerdo especial. ✨</p>
    <div class="hero-btns">
        <a href="{{ route('menu') }}" class="btn-gc-primary">Ver Menú ✨</a>
        <a href="{{ route('contacto') }}" class="btn-gc-outline">Contactanos En </a>
    </div>
</section>

<section class="features">
    <p class="section-title">¿Por qué elegirnos?</p>
    <p class="section-sub">Más que café, vivimos momentos contigo</p>
    <div class="features-grid">
        <div class="feature-card"><div class="feature-icon fi-yellow">☕</div><h3>Café premium</h3><p>Granos seleccionados de las mejores regiones cafeteras de Colombia</p></div>
        <div class="feature-card"><div class="feature-icon fi-pink">🎶</div><h3>Ambiente único</h3><p>Música, luz y decoración pensada para que te quedes un poco más</p></div>
        <div class="feature-card"><div class="feature-icon fi-purple">📅</div><h3>Reserva fácil</h3><p>Reserva tu mesa en segundos directamente desde nuestra web</p></div>
        <div class="feature-card"><div class="feature-icon fi-teal">🌿</div><h3>100% natural</h3><p>Ingredientes frescos y locales en cada bebida y postre</p></div>
    </div>
</section>

<section class="video-section">
    <p class="section-title">Conoce nuestra historia 🎬</p>
    <p class="section-sub">Un viaje visual por el sabor del volcán</p>
    <div class="video-wrapper">
        <iframe src="https://www.youtube.com/embed/df3JeXVWYWA?si=7qnArwBuq34wEsi0"
            title="Galeras Coffe"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
</section>

<section class="cta-section">
    <h2>¿Listo para vivir la experiencia? 🚀</h2>
    <p>Reserva tu mesa ahora y disfruta de un momento inolvidable en Galeras Coffe</p>
    <a href="{{ route('reservas') }}" class="btn-gc-dark">Reservar ahora</a>
</section>

@endsection