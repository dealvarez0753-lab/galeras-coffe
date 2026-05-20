@extends('layouts.app')
@section('title', 'Contacto')
@section('content')

<style>
    .contacto-hero {
        background: linear-gradient(135deg, #1a1a2e, #0f3460);
        padding: 70px 2rem; text-align: center;
    }
    .contacto-hero h1 { font-size: 38px; font-weight: 700; color: #fff; margin-bottom: 12px; }
    .contacto-hero h1 span { color: #f9c74f; }
    .contacto-hero p { color: #aaa; font-size: 16px; max-width: 500px; margin: 0 auto; line-height: 1.7; }

    .contacto-section { padding: 72px 2rem; background: #f8f9fa; }
    .section-title { font-size: 28px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; text-align: center; }
    .section-sub { color: #888; font-size: 15px; text-align: center; margin-bottom: 48px; }

    .contact-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px; max-width: 900px; margin: 0 auto 60px;
    }
    .contact-card {
        background: #fff; border-radius: 20px; padding: 32px 24px; text-align: center;
        border: 1px solid #eee; transition: transform .2s, box-shadow .2s;
    }
    .contact-card:hover { transform: translateY(-4px); box-shadow: 0 12px 40px rgba(0,0,0,0.08); }
    .contact-icon {
        width: 64px; height: 64px; border-radius: 18px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 18px; font-size: 30px;
    }
    .ci-yellow { background: #fff8e1; }
    .ci-blue   { background: #e3f2fd; }
    .ci-green  { background: #e8f5e9; }
    .ci-pink   { background: #fce4ec; }
    .contact-card h3 { font-size: 17px; font-weight: 700; color: #1a1a2e; margin-bottom: 10px; }
    .contact-card p { color: #777; font-size: 14px; line-height: 1.7; margin: 0; }
    .contact-card a { color: #f8961e; text-decoration: none; font-weight: 600; }
    .contact-card a:hover { text-decoration: underline; }

    .horario-section { background: #fff; padding: 64px 2rem; }
    .horario-table { max-width: 500px; margin: 0 auto; }
    .horario-row {
        display: flex; justify-content: space-between; align-items: center;
        padding: 14px 0; border-bottom: 1px solid #f0f0f0; font-size: 15px;
    }
    .horario-row:last-child { border-bottom: none; }
    .horario-day { color: #1a1a2e; font-weight: 600; }
    .horario-time { color: #888; }
    .badge-open {
        background: #e8f5e9; color: #2e7d32;
        font-size: 11px; font-weight: 600;
        padding: 3px 10px; border-radius: 10px;
    }

    .redes-section {
        background: linear-gradient(135deg, #f9c74f, #f8961e);
        padding: 64px 2rem; text-align: center;
    }
    .redes-section h2 { font-size: 28px; font-weight: 700; color: #1a1a2e; margin-bottom: 10px; }
    .redes-section p { color: rgba(26,26,46,0.7); margin-bottom: 28px; font-size: 15px; }
    .redes-grid { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }
    .red-btn {
        background: #1a1a2e; color: #f9c74f;
        padding: 12px 28px; border-radius: 25px;
        text-decoration: none; font-size: 14px; font-weight: 600;
        transition: transform .2s;
    }
    .red-btn:hover { transform: translateY(-2px); color: #f9c74f; }
</style>

<section class="contacto-hero">
    <h1><span>Contacto</span> 🏪</h1>
    <p>Puede comunicarse con nosotros a través de los siguientes canales oficiales. Estaremos felices de atenderle. 😊</p>
</section>

<section class="contacto-section">
    <p class="section-title">¿Cómo encontrarnos?</p>
    <p class="section-sub">Estamos aquí para atenderte siempre</p>
    <div class="contact-grid">
        <div class="contact-card">
            <div class="contact-icon ci-yellow">📍</div>
            <h3>Dirección</h3>
            <p>Calle 12 # 8-45, Centro<br>Pasto, Nariño — Colombia</p>
        </div>
        <div class="contact-card">
            <div class="contact-icon ci-blue">📞</div>
            <h3>Teléfono</h3>
            <p><a href="tel:+573001234567">+57 300 123 4567</a></p>
        </div>
        <div class="contact-card">
            <div class="contact-icon ci-green">📧</div>
            <h3>Correo y Redes Sociales</h3>
            <p><a href="mailto:cafegaleras@email.com">galerascoffe@email.com</a></p>
            <p>Instagram: <a href="#">@galerascoffe</a><br>Facebook: <a href="#">Galeras Coffe</a></p>
    </div>
</section>

<section class="horario-section">
    <p class="section-title">Horarios de atención 🕒</p>
    <p class="section-sub">Visítanos cuando más lo necesites</p>
    <div class="horario-table">
        <div class="horario-row">
            <span class="horario-day">Lunes a Viernes</span>
            <span class="horario-time">8:00 AM – 8:00 PM</span>
            <span class="badge-open">Abierto</span>
        </div>
        <div class="horario-row">
            <span class="horario-day">Sábados</span>
            <span class="horario-time">9:00 AM – 9:00 PM</span>
            <span class="badge-open">Abierto</span>
        </div>
        <div class="horario-row">
            <span class="horario-day">Domingos</span>
            <span class="horario-time">9:00 AM – 6:00 PM</span>
            <span class="badge-open">Abierto</span>
        </div>
    </div>
</section>

@endsection