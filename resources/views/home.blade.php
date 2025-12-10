@extends('layouts.app')

@section('content')
<style>
    /* Hero Section */
    .hero {
        position: relative;
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin: -3rem -0.75rem 3rem -0.75rem;
        padding: 4rem 1rem;
        overflow: hidden;
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: url('{{ asset('img/hero.png') }}') center/cover no-repeat;
        filter: brightness(0.3) saturate(1.2);
        z-index: -2;
    }

    .hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, 
            rgba(10, 10, 15, 0.4) 0%, 
            rgba(10, 10, 15, 0.6) 50%,
            rgba(10, 10, 15, 0.95) 100%);
        z-index: -1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        animation: fadeInUp 0.8s ease forwards;
    }

    /* Animated Gradient Text */
    .hero-title {
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.1;
    }

    .hero-title .highlight {
        background: linear-gradient(135deg, #ff6600, #ff8533, #ffaa00, #ff6600);
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 4s ease infinite;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.25rem);
        color: rgba(255, 255, 255, 0.8);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Floating particles */
    .particles {
        position: absolute;
        inset: 0;
        overflow: hidden;
        z-index: 0;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 102, 0, 0.4);
        border-radius: 50%;
        animation: float 15s infinite;
    }

    .particle:nth-child(1) { left: 10%; animation-delay: 0s; animation-duration: 20s; }
    .particle:nth-child(2) { left: 20%; animation-delay: 2s; animation-duration: 18s; }
    .particle:nth-child(3) { left: 30%; animation-delay: 4s; animation-duration: 22s; }
    .particle:nth-child(4) { left: 40%; animation-delay: 1s; animation-duration: 19s; }
    .particle:nth-child(5) { left: 50%; animation-delay: 3s; animation-duration: 21s; }
    .particle:nth-child(6) { left: 60%; animation-delay: 5s; animation-duration: 17s; }
    .particle:nth-child(7) { left: 70%; animation-delay: 2s; animation-duration: 23s; }
    .particle:nth-child(8) { left: 80%; animation-delay: 4s; animation-duration: 16s; }
    .particle:nth-child(9) { left: 90%; animation-delay: 1s; animation-duration: 20s; }

    @keyframes float {
        0% {
            transform: translateY(100vh) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) scale(1);
            opacity: 0;
        }
    }

    /* Info Section */
    .section-card {
        background: linear-gradient(145deg, rgba(15, 26, 34, 0.8), rgba(4, 28, 50, 0.6));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 102, 0, 0.15);
        border-radius: 20px;
        padding: 3rem 2rem;
        margin: 0 auto 3rem auto;
        max-width: 900px;
        box-shadow: 
            0 4px 30px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
        transition: all 0.4s ease;
        animation: fadeInUp 0.8s ease forwards;
        animation-delay: 0.2s;
        opacity: 0;
    }

    .section-card:hover {
        border-color: rgba(255, 102, 0, 0.35);
        transform: translateY(-5px);
        box-shadow: 
            0 8px 40px rgba(0, 0, 0, 0.4),
            0 0 30px rgba(255, 102, 0, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.08);
    }

    .section-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .section-title .text-orange {
        color: #ff6600;
    }

    .section-text {
        font-size: 1.05rem;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.7;
        text-align: center;
        margin-bottom: 1rem;
    }

    /* Divider */
    .section-divider {
        width: 100px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #ff6600, transparent);
        margin: 2rem auto;
        border-radius: 2px;
    }

    /* CTA Buttons */
    .btn-group-cta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
    }

    .btn-cta {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.9rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        color: #ff6600;
        background: transparent;
        border: 2px solid #ff6600;
        border-radius: 12px;
        text-decoration: none;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-cta::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #ff6600, #ff8533);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .btn-cta:hover {
        color: #fff;
        border-color: #ff8533;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 102, 0, 0.3);
    }

    .btn-cta:hover::before {
        opacity: 1;
    }

    .btn-cta svg {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    .btn-cta:hover svg {
        transform: translateX(3px);
    }

    /* Fade in animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero {
            min-height: 60vh;
            padding: 3rem 1rem;
        }
        
        .section-card {
            padding: 2rem 1.5rem;
            margin: 0 0.5rem 2rem 0.5rem;
        }
        
        .btn-group-cta {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-cta {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
    }
</style>

<div class="hero">
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    <div class="hero-content">
        <h1 class="hero-title">
            <span class="highlight">SYSTECH 2025</span><br>
            fue un éxito rotundo
        </h1>
        <p class="hero-subtitle">
            La Universidad Americana agradece a cada participante que formó parte de esta experiencia única de innovación, tecnología y aprendizaje colaborativo.
        </p>
    </div>
</div>

<section class="section-card">
    <h2 class="section-title">
        ¿Qué es <span class="text-orange">SYSTECH</span>?
    </h2>
    <p class="section-text">
        <span class="text-orange">SYSTECH</span> es el Congreso Nacional de Ingeniería en Sistemas de Información impulsado por la
        <strong>Universidad Americana (UAM)</strong>. Desde su primera edición en 2023, ha servido como espacio de encuentro para que la comunidad académica y profesional comparta ideas, avances y experiencias tecnológicas.
    </p>
    <p class="section-text">
        Este congreso se celebra anualmente con el propósito de fomentar la innovación, la formación práctica y el pensamiento crítico en áreas como el desarrollo de software, la ciberseguridad, la automatización y la transformación digital.
    </p>
    
    <div class="section-divider"></div>
    
    <div class="btn-group-cta">
        <a href="{{ route('registro.uam') }}" class="btn-cta">
            Estudiantes UAM
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
        <a href="{{ route('registro.externa') }}" class="btn-cta">
            Comunidad Externa
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>
</section>
@endsection
