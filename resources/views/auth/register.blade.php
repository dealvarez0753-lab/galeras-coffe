<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro — Galeras Coffe</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { font-family: 'Figtree', sans-serif; box-sizing: border-box; margin: 0; padding: 0; }
        body { background: #1a1a2e; min-height: 100vh; display: flex; flex-direction: column; }

        .gc-navbar {
            background: #1a1a2e;
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,0.07);
        }
        .gc-brand {
            font-size: 20px; font-weight: 700;
            background: linear-gradient(90deg, #f9c74f, #f8961e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none; letter-spacing: 1px;
        }
        .gc-nav-links { display: flex; gap: 4px; align-items: center; }
        .gc-nav-links a {
            color: #ccc; text-decoration: none; font-size: 14px;
            padding: 7px 14px; border-radius: 20px; transition: all .2s;
        }
        .gc-nav-links a:hover { background: #f9c74f; color: #1a1a2e; font-weight: 600; }

        .register-wrapper {
            flex: 1; display: flex; align-items: center;
            justify-content: center; padding: 40px 20px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        }
        .register-card {
            background: #fff; border-radius: 24px;
            padding: 44px 40px; width: 100%; max-width: 420px;
            box-shadow: 0 24px 80px rgba(0,0,0,0.4);
        }
        .register-logo {
            text-align: center; margin-bottom: 28px;
        }
        .register-logo span { font-size: 36px; display: block; margin-bottom: 8px; }
        .register-logo h1 { font-size: 22px; font-weight: 700; color: #1a1a2e; margin-bottom: 4px; }
        .register-logo p { color: #888; font-size: 14px; }

        .gc-label {
            font-size: 13px; font-weight: 600;
            color: #1a1a2e; margin-bottom: 6px; display: block;
        }
        .gc-input {
            width: 100%; padding: 12px 16px;
            border: 1.5px solid #e0e0e0; border-radius: 12px;
            font-size: 15px; outline: none; background: #fafafa;
            transition: border-color .2s; color: #f5e6d3;
        }
        .gc-input:focus { border-color: #f9c74f; background: #fff; }
        .mb-gc { margin-bottom: 20px; }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #f9c74f, #f8961e);
            color: #1a1a2e; border: none; padding: 14px;
            border-radius: 14px; font-size: 16px; font-weight: 700;
            cursor: pointer; transition: transform .2s, box-shadow .2s;
            margin-top: 8px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(249,199,79,0.4);
        }
        .register-footer {
            text-align: center; margin-top: 20px;
            font-size: 13px; color: #888;
        }
        .register-footer a { color: #f8961e; font-weight: 600; text-decoration: none; }
        .register-footer a:hover { text-decoration: underline; }

        .alert-error {
            background: #f8d7da; color: #721c24;
            border: 1px solid #f5c6cb; border-radius: 10px;
            padding: 10px 14px; font-size: 13px; margin-bottom: 18px;
        }
        .input-hint {
            font-size: 11px; color: #aaa; margin-top: 4px;
        }
        .gc-footer {
            background: #1a1a2e; color: #555;
            text-align: center; padding: 20px;
            font-size: 12px; border-top: 1px solid rgba(255,255,255,0.05);
        }
        .gc-footer span { color: #f9c74f; font-weight: 600; }
    </style>
</head>
<body>

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
            <a href="{{ route('login') }}" style="border: 1px solid rgba(255,255,255,0.2);">Login</a>
        </div>
    </nav>

    <div class="register-wrapper">
        <div class="register-card">
            <div class="register-logo">
                <span>🌋</span>
                <h1>Crea tu cuenta</h1>
                <p>Únete a la familia Galeras Coffe</p>
            </div>

            @if($errors->any())
                <div class="alert-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-gc">
                    <label class="gc-label" for="name">Nombre completo</label>
                    <input id="name" class="gc-input" type="text" name="name"
                        value="{{ old('name') }}" required autofocus autocomplete="name"
                        placeholder="Tu nombre">
                </div>

                <div class="mb-gc">
                    <label class="gc-label" for="email">Correo electrónico</label>
                    <input id="email" class="gc-input" type="email" name="email"
                        value="{{ old('email') }}" required autocomplete="username"
                        placeholder="tucorreo@email.com">
                </div>

                <div class="mb-gc">
                    <label class="gc-label" for="password">Contraseña</label>
                    <input id="password" class="gc-input" type="password" name="password"
                        required autocomplete="new-password" placeholder="Mínimo 8 caracteres">
                    <p class="input-hint">Usa al menos 8 caracteres con letras y números</p>
                </div>

                <div class="mb-gc">
                    <label class="gc-label" for="password_confirmation">Confirmar contraseña</label>
                    <input id="password_confirmation" class="gc-input" type="password"
                        name="password_confirmation" required autocomplete="new-password"
                        placeholder="Repite tu contraseña">
                </div>

                <button type="submit" class="btn-submit">Crear cuenta 🎉</button>
            </form>

            <div class="register-footer">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <footer class="gc-footer">
        © 2026 <span>Galeras Coffe</span> — Proyecto Académico · Programación Avanzada
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>