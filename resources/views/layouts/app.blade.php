<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Galeras Coffe') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { font-family: 'Figtree', sans-serif; box-sizing: border-box; }
        body { background: #f4f4f8; margin: 0; }

        .gc-navbar {
            background: #1a1a2e;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }
        .gc-brand {
            font-size: 20px;
            font-weight: 700;
            background: linear-gradient(90deg, #f9c74f, #f8961e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            letter-spacing: 1px;
        }
        .gc-nav-links { display: flex; gap: 4px; align-items: center; flex-wrap: wrap; }
        .gc-nav-links a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            padding: 7px 14px;
            border-radius: 20px;
            transition: all .2s;
            white-space: nowrap;
        }
        .gc-nav-links a:hover { background: #f9c74f; color: #1a1a2e; font-weight: 600; }
        .gc-nav-links .btn-register {
            background: #f9c74f;
            color: #1a1a2e !important;
            font-weight: 600;
        }
        .gc-nav-links .btn-register:hover { background: #f8961e; }
        .gc-nav-links form button {
            background: none; border: none;
            color: #ccc; font-size: 14px;
            padding: 7px 14px; border-radius: 20px;
            cursor: pointer; transition: all .2s;
        }
        .gc-nav-links form button:hover { background: #e63946; color: #fff; }

        .gc-footer {
            background: #1a1a2e;
            color: #777;
            text-align: center;
            padding: 28px 2rem;
            font-size: 13px;
            margin-top: auto;
        }
        .gc-footer span { color: #f9c74f; font-weight: 600; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="gc-navbar">
        <a class="gc-brand" href="{{ url('/') }}">☕ Galeras Coffe</a>
        <div class="gc-nav-links">
            <!-- Enlaces Públicos -->
                            <li class="nav-item"><a class="nav-link" href="{{ route('inicio') }}">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('menu') }}">Menú</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contacto') }}">Contacto</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('mensaje') }}">Mensaje</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('reservas') }}">Reservas</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('exitosa') }}">Exitosa</a></li>

            @guest
                <a href="{{ route('login') }}" style="border: 1px solid rgba(255,255,255,0.2);">Login</a>
                <a href="{{ route('register') }}" class="btn-register">Registro</a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @endauth
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="gc-footer">
        © 2026 <span>Galeras Coffe</span> — Proyecto Académico · Programación Avanzada
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>