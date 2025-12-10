<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYSTECH 2025</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#111; color:#fff;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo-uam.png') }}" alt="UAM" style="height:40px;">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="/" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="/agenda" class="nav-link">Agenda</a></li>
                    <li class="nav-item"><a href="/registro-uam" class="nav-link">Registro UAM</a></li>
                    <li class="nav-item"><a href="/registro-externa" class="nav-link">Registro Externa</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="text-center py-4 border-top border-secondary">
        <p>SYSTECH © 2025 — Universidad Americana (UAM)</p>
    </footer>
</body>
</html>
