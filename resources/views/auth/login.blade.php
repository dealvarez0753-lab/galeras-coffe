<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — Galeras Coffe</title>
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

        .login-wrapper {
            flex: 1; display: flex; align-items: center;
            justify-content: center; padding: 40px 20px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        }
        .login-card {
            background: #fff; border-radius: 24px;
            padding: 44px 40px; width: 100%; max-width: 420px;
            box-shadow: 0 24px 80px rgba(0,0,0,0.4);
        }
        .login-logo {
            text-align: center; margin-bottom: 28px;
        }
        .login-logo span {
            font-size: 36px; display: block; margin-bottom: 8px;
        }
        .login-logo h1 {
            font-size: 22px; font-weight: 700; color: #1a1a2e; margin-bottom: 4px;
        }
        .login-logo p { color: #888; font-size: 14px; }

        .gc-label {
            font-size: 13px; font-weight: 600;
            color: #1a1a2e; margin-bottom: 6px; display: block;
        }
        .gc-input {
            width: 100%; padding: 12px 16px;
            border: 1.5px solid #e0e0e0; border-radius: 12px;
            font-size: 15px; outline: none; background: #fafafa;
            transition: border-color .2s; color: #1a1a2e;
        }
        .gc-input:focus { border-color: #f9c74f; background: #fff; }
        .mb-gc { margin-bottom: 20px; }

        .check-row {
            display: flex; align-items: center; gap: 8px;
            font-size: 13px; color: #555; margin-bottom: 24px;
        }
        .check-row input { width: 16px; height: 16px; accent-color: #f9c74f; }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #f9c74f, #f8961e);
            color: #1a1a2e; border: none; padding: 14px;
            border-radius: 14px; font-size: 16px; font-weight: 700;
            cursor: pointer; transition: transform .2s, box-shadow .2s;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(249,199,79,0.4);
        }
        .login-footer {
            text-align: center; margin-top: 20px;
            font-size: 13px; color: #888;
        }
        .login-footer a { color: #f8961e; font-weight: 600; text-decoration: none; }
        .login-footer a:hover { text-decoration: underline; }

        .forgot-link {
            display: block; text-align: right;
            font-size: 12px; color: #888; margin-bottom: 20px;
            text-decoration: none; transition: color .2s;
        }
        .forgot-link:hover { color: #f8961e; }

        .alert-error {
            background: #f8d7da; color: #721c24;
            border: 1px solid #f5c6cb; border-radius: 10px;
            padding: 10px 14px; font-size: 13px; margin-bottom: 18px;
        }
        .alert-status {
            background: #d4edda; color: #155724;
            border: 1px solid #c3e6cb; border-radius: 10px;
            padding: 10px 14px; font-size: 13px; margin-bottom: 18px;
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
            <a href="{{ route('register') }}" style="background:#f9c74f; color:#f5e6d3; font-weight:700;">Registro</a>
        </div>
    </nav>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-logo">
                <span>☕</span>
                <h1>Bienvenido de vuelta</h1>
                <p>Inicia sesión en tu cuenta de Galeras Coffe</p>
            </div>

            @if(session('status'))
                <div class="alert-status">{{ session('status') }}</div>
            @endif

            @if($errors->any())
                <div class="alert-error">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-gc">
                    <label class="gc-label" for="email">Correo electrónico</label>
                    <input id="email" class="gc-input" type="email" name="email"
                        value="{{ old('email') }}" required autofocus autocomplete="username"
                        placeholder="tucorreo@email.com">
                </div>

                <div class="mb-gc">
                    <label class="gc-label" for="password">Contraseña</label>
                    <input id="password" class="gc-input" type="password" name="password"
                        required autocomplete="current-password" placeholder="••••••••">
                </div>

                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <div class="check-row">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Recordarme</label>
                </div>

                <button type="submit" class="btn-submit">Iniciar sesión</button>
            </form>

            <div class="login-footer">
                ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
            </div>
        </div>
    </div>

    <footer class="gc-footer">
        © 2026 <span>Galeras Coffe</span> — Proyecto Académico · Programación Avanzada
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>