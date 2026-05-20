@extends('layouts.app')
@section('title', 'Menú')
@section('content')

<style>
    .menu-hero {
        background: linear-gradient(135deg, #1a1a2e, #0f3460);
        padding: 60px 2rem; text-align: center;
    }
    .menu-hero h1 { font-size: 38px; font-weight: 700; color: #fff; margin-bottom: 10px; }
    .menu-hero h1 span { color: #f9c74f; }
    .menu-hero p { color: #aaa; font-size: 16px; max-width: 500px; margin: 0 auto; }

    .menu-section { padding: 64px 2rem; background: #f8f9fa; }
    .section-badge {
        display: inline-block; background: rgba(249,199,79,0.15);
        color: #f8961e; border: 1px solid rgba(248,150,30,0.3);
        font-size: 12px; font-weight: 600; padding: 5px 16px;
        border-radius: 20px; margin-bottom: 12px; letter-spacing: 1px; text-transform: uppercase;
    }
    .section-title { font-size: 28px; font-weight: 700; color: #1a1a2e; margin-bottom: 6px; text-align: center; }
    .section-sub { color: #888; font-size: 15px; text-align: center; margin-bottom: 48px; }
    .menu-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 28px; max-width: 980px; margin: 0 auto;
    }
    .menu-card {
        background: #fff; border-radius: 24px; overflow: hidden;
        border: 1px solid #eee; transition: transform .25s, box-shadow .25s;
    }
    .menu-card:hover { transform: translateY(-6px); box-shadow: 0 16px 50px rgba(0,0,0,0.1); }
    .menu-card-img { width: 100%; height: 220px; object-fit: cover; display: block; }
    .menu-card-body { padding: 24px; }
    .menu-card-tag {
        display: inline-block; font-size: 11px; font-weight: 600;
        padding: 3px 12px; border-radius: 10px; margin-bottom: 10px;
        letter-spacing: 0.5px; text-transform: uppercase;
    }
    .tag-hot    { background: #fff0e0; color: #e05a00; }
    .tag-cold   { background: #e0f2ff; color: #0070cc; }
    .tag-special{ background: #f3e8ff; color: #7c3aed; }
    .menu-card-body h3 { font-size: 20px; font-weight: 700; color: #1a1a2e; margin-bottom: 10px; }
    .menu-card-body p { color: #777; font-size: 14px; line-height: 1.7; margin-bottom: 18px; }
    .menu-card-footer {
        display: flex; align-items: center; justify-content: space-between;
        padding-top: 14px; border-top: 1px solid #f0f0f0;
    }
    .menu-price { font-size: 22px; font-weight: 700; color: #f8961e; }
    .btn-order {
        background: #1a1a2e; color: #f9c74f; border: none;
        padding: 8px 20px; border-radius: 20px; font-size: 13px;
        font-weight: 600; cursor: pointer; text-decoration: none; transition: background .2s;
    }
    .btn-order:hover { background: #f9c74f; color: #1a1a2e; }

    .menu-cta { background: linear-gradient(135deg, #f9c74f, #f8961e); padding: 60px 2rem; text-align: center; }
    .menu-cta h2 { font-size: 28px; font-weight: 700; color: #1a1a2e; margin-bottom: 12px; }
    .menu-cta p { color: rgba(26,26,46,0.7); margin-bottom: 28px; }
    .btn-gc-dark {
        background: #1a1a2e; color: #f9c74f; border: none;
        padding: 14px 36px; border-radius: 25px; font-size: 15px;
        font-weight: 700; text-decoration: none; display: inline-block; transition: transform .2s;
    }
    .btn-gc-dark:hover { transform: translateY(-2px); color: #f9c74f; }
</style>

<section class="menu-hero">
    <h1>Nuestros <span>Productos</span> 👨‍🍳</h1>
    <p>Cada bebida, una experiencia. Elaboradas con los mejores granos colombianos.</p>
</section>

<section class="menu-section">
    <div style="text-align:center">
        <span class="section-badge">☕ Bebidas especiales</span>
    </div>
    <p class="section-title">Lo mejor de Galeras Coffe</p>
    <p class="section-sub">Elaboradas con amor y los mejores ingredientes de la región</p>
    <div class="menu-grid">

        <div class="menu-card">
            <img class="menu-card-img"
                src="https://thumbs.dreamstime.com/b/taza-de-capuchino-con-arte-latte-card%C3%ADaco-y-cacao-sobre-mesa-madera-fresco-en-forma-coraz%C3%B3n-servido-una-oscura-acompa%C3%B1ado-polvo-384230957.jpg"
                alt="Capuchino">
            <div class="menu-card-body">
                <span class="menu-card-tag tag-hot">🔥 Caliente</span>
                <h3>Capuchino</h3>
                <p>El equilibrio perfecto entre la intensidad de nuestro café de altura y la suavidad de la leche perfectamente cremada. Una textura sedosa con microespuma densa. ☕</p>
                <div class="menu-card-footer">
                    <span class="menu-price">$8.000</span>
                    <a href="{{ route('reservas') }}" class="btn-order">Reservar ahora</a>
                </div>
            </div>
        </div>

        <div class="menu-card">
            <img class="menu-card-img"
                src="https://estaticos.elcolombiano.com/binrepository/848x565/34c0/780d565/none/11101/KBRH/imagen-cvcafe-10-jpg_42643383_20230621102551.jpg"
                alt="Americano Colombiano">
            <div class="menu-card-body">
                <span class="menu-card-tag tag-special">❤️ Especial</span>
                <h3>Americano Colombiano</h3>
                <p>La esencia pura de nuestras montañas en una taza. Notas sutiles a panela, frutos rojos y un final limpio que enamora. ☕❤️</p>
                <div class="menu-card-footer">
                    <span class="menu-price">$6.000</span>
                    <a href="{{ route('reservas') }}" class="btn-order">Reservar ahora</a>
                </div>
            </div>
        </div>

        <div class="menu-card">
            <img class="menu-card-img"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5jP5vBF3AMw0dTUMNLfxlrkJ7msNLbOESUA&s"
                alt="Frappuccino">
            <div class="menu-card-body">
                <span class="menu-card-tag tag-cold">❄️ Frío</span>
                <h3>Frappuccino</h3>
                <p>Granizado ultra cremoso con leche premium, coronado con crema batida e hilos de caramelo o chocolate. ☕</p>
                <div class="menu-card-footer">
                    <span class="menu-price">$12.000</span>
                    <a href="{{ route('reservas') }}" class="btn-order">Reservar ahora</a>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection