<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYSTECH 2025 - Congreso Nacional de Ingeniería en Sistemas</title>
    <meta name="description" content="SYSTECH 2025 - Congreso Nacional de Ingeniería en Sistemas de Información de la Universidad Americana (UAM)">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <style>
        :root {
            --primary-orange: #ff6600;
            --primary-orange-glow: rgba(255, 102, 0, 0.4);
            --dark-bg: #0a0a0f;
            --dark-card: #0f1a22;
            --dark-card-hover: #162530;
            --dark-nav: rgba(15, 26, 34, 0.85);
            --text-white: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.7);
            --gradient-orange: linear-gradient(135deg, #ff6600, #ff8533);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--dark-bg);
            color: var(--text-white);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated background gradient */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(ellipse at 20% 0%, rgba(255, 102, 0, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 100%, rgba(255, 102, 0, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        /* Glassmorphism Navbar */
        .navbar-glass {
            background: var(--dark-nav);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }

        .navbar-glass.scrolled {
            padding: 0.5rem 0;
            background: rgba(10, 10, 15, 0.95);
        }

        .navbar-brand img {
            height: 45px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .nav-link {
            color: var(--text-muted) !important;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--primary-orange);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover {
            color: var(--text-white) !important;
            background: rgba(255, 102, 0, 0.1);
        }

        .nav-link:hover::after {
            width: 60%;
        }

        .nav-link.active {
            color: var(--primary-orange) !important;
        }

        /* Mobile Menu Toggle */
        .navbar-toggler {
            border: 1px solid rgba(255, 102, 0, 0.5);
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px var(--primary-orange-glow);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 102, 0, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 180px);
        }

        /* Footer */
        .footer-glass {
            background: linear-gradient(180deg, transparent, rgba(15, 26, 34, 0.8));
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .footer-glass p {
            color: var(--text-muted);
            margin: 0;
            font-size: 0.9rem;
        }

        .footer-glass .text-orange {
            color: var(--primary-orange);
            font-weight: 600;
        }

        /* Utility Classes */
        .text-orange {
            color: var(--primary-orange);
        }

        .bg-glass {
            background: rgba(15, 26, 34, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Fade in animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-bg);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 102, 0, 0.3);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-orange);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-glass fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo-uam.png') }}" alt="UAM - Universidad Americana">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="/agenda" class="nav-link {{ request()->is('agenda') ? 'active' : '' }}">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a href="/registro-uam" class="nav-link {{ request()->is('registro-uam') ? 'active' : '' }}">Registro UAM</a>
                    </li>
                    <li class="nav-item">
                        <a href="/registro-externa" class="nav-link {{ request()->is('registro-externa') ? 'active' : '' }}">Comunidad Externa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5" style="margin-top: 80px;">
        @yield('content')
    </main>

    <footer class="footer-glass text-center">
        <div class="container">
            <p><span class="text-orange">SYSTECH</span> © 2025 — Universidad Americana (UAM)</p>
            <p class="mt-2" style="font-size: 0.8rem;">Congreso Nacional de Ingeniería en Sistemas de Información</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-glass');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
