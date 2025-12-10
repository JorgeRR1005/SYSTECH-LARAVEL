@extends('layouts.app')

@section('content')
<style>
    .agenda-container {
        max-width: 900px;
        margin: 0 auto;
        animation: fadeInUp 0.6s ease forwards;
    }

    .agenda-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .agenda-title {
        font-size: clamp(1.75rem, 4vw, 2.25rem);
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .agenda-title .highlight {
        background: linear-gradient(135deg, #ff6600, #ff8533);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .agenda-subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 1rem;
    }

    /* Timeline */
    .timeline {
        position: relative;
        padding: 1rem 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(180deg, 
            transparent,
            rgba(255, 102, 0, 0.5) 10%,
            rgba(255, 102, 0, 0.5) 90%,
            transparent
        );
    }

    .timeline-item {
        position: relative;
        padding-left: 60px;
        padding-bottom: 1.5rem;
        opacity: 0;
        animation: fadeInUp 0.5s ease forwards;
    }

    .timeline-item:nth-child(1) { animation-delay: 0.1s; }
    .timeline-item:nth-child(2) { animation-delay: 0.15s; }
    .timeline-item:nth-child(3) { animation-delay: 0.2s; }
    .timeline-item:nth-child(4) { animation-delay: 0.25s; }
    .timeline-item:nth-child(5) { animation-delay: 0.3s; }
    .timeline-item:nth-child(6) { animation-delay: 0.35s; }
    .timeline-item:nth-child(7) { animation-delay: 0.4s; }
    .timeline-item:nth-child(8) { animation-delay: 0.45s; }
    .timeline-item:nth-child(9) { animation-delay: 0.5s; }
    .timeline-item:nth-child(10) { animation-delay: 0.55s; }
    .timeline-item:nth-child(11) { animation-delay: 0.6s; }
    .timeline-item:nth-child(12) { animation-delay: 0.65s; }
    .timeline-item:nth-child(13) { animation-delay: 0.7s; }

    .timeline-dot {
        position: absolute;
        left: 12px;
        top: 5px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #0a0a0f;
        border: 3px solid #ff6600;
        box-shadow: 0 0 15px rgba(255, 102, 0, 0.4);
        transition: all 0.3s ease;
    }

    .timeline-item:hover .timeline-dot {
        background: #ff6600;
        transform: scale(1.2);
    }

    .timeline-card {
        background: linear-gradient(145deg, rgba(15, 26, 34, 0.7), rgba(15, 26, 34, 0.4));
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 12px;
        padding: 1.25rem 1.5rem;
        transition: all 0.3s ease;
    }

    .timeline-item:hover .timeline-card {
        background: linear-gradient(145deg, rgba(15, 26, 34, 0.9), rgba(15, 26, 34, 0.6));
        border-color: rgba(255, 102, 0, 0.3);
        transform: translateX(5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .timeline-time {
        display: inline-block;
        background: linear-gradient(135deg, rgba(255, 102, 0, 0.2), rgba(255, 102, 0, 0.1));
        color: #ff6600;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 0.3rem 0.75rem;
        border-radius: 20px;
        margin-bottom: 0.5rem;
    }

    .timeline-content {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .timeline-content strong {
        color: #fff;
    }

    /* Break items */
    .timeline-item.break .timeline-card {
        background: linear-gradient(145deg, rgba(255, 102, 0, 0.1), rgba(255, 102, 0, 0.05));
        border-color: rgba(255, 102, 0, 0.2);
    }

    .timeline-item.break .timeline-content {
        color: rgba(255, 255, 255, 0.7);
        font-style: italic;
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

    /* Responsive */
    @media (max-width: 768px) {
        .timeline::before {
            left: 15px;
        }
        
        .timeline-item {
            padding-left: 50px;
        }
        
        .timeline-dot {
            left: 7px;
            width: 16px;
            height: 16px;
        }
        
        .timeline-card {
            padding: 1rem;
        }
    }
</style>

<div class="agenda-container">
    <div class="agenda-header">
        <h1 class="agenda-title">
            Cronograma <span class="highlight">SYSTECH 2025</span>
        </h1>
        <p class="agenda-subtitle">Jornada Tecnológica • Universidad Americana</p>
    </div>

    <div class="timeline">
        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">9:00 – 9:10 am</span>
                <p class="timeline-content">Himno Nacional / canciones nacionales por parte de la UAM</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">9:10 – 9:15 am</span>
                <p class="timeline-content">Palabras del Rector <strong>Ing. Martín Guevara</strong></p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">9:15 – 9:20 am</span>
                <p class="timeline-content">Presentación de los Robot LED <em>(Actividad Cultural)</em></p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">9:20 – 9:50 am</span>
                <p class="timeline-content"><strong>Dr. Jilber Urbina</strong> — "IA como extensión del pensamiento humano"</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">10:00 – 10:40 am</span>
                <p class="timeline-content"><strong>Jesús Guzmán (México)</strong> — "AI Hacking: Cómo vulnerar una IA para aprovechar sus capacidades de manera positiva"</p>
            </div>
        </div>

        <div class="timeline-item break">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">10:50 – 11:20 am</span>
                <p class="timeline-content">☕ Coro UAM / Coffee Break</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">11:25 – 11:40 am</span>
                <p class="timeline-content"><strong>Empresa NEXUS</strong> — "La evolución del trabajo en la era de la IA: ¿Estamos listos?" <em>(MSc. Arley Paredes, MSc. Cindy Romero)</em></p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">11:45 – 12:10 pm</span>
                <p class="timeline-content"><strong>Samsung</strong> — "Inteligencia Artificial Aplicada: El Ecosistema Samsung que Transforma tu Día a Día" <em>(Lcda. Yamil Maradiaga)</em></p>
            </div>
        </div>

        <div class="timeline-item break">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">12:15 – 1:15 pm</span>
                <p class="timeline-content">🍽️ Almuerzo / Toque de instrumento para armonizar el salón</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">1:30 – 2:00 pm</span>
                <p class="timeline-content"><strong>AMPM</strong> — "Conveniencia Aumentada" <em>(Keneth Salgueiro y Vilma Berríos)</em></p>
            </div>
        </div>

        <div class="timeline-item break">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">2:05 – 2:45 pm</span>
                <p class="timeline-content">☕ Receso / Coffee Break</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">2:50 – 3:30 pm</span>
                <p class="timeline-content"><strong>Conversatorio</strong> — MSc. Osvaldo Enrique Prasca y Jesús Guzmán</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">3:35 – 4:15 pm</span>
                <p class="timeline-content">🌐 <strong>Tecasa (Virtual)</strong> — "Big Data, Smart Decisions: Cómo la información masiva impulsa negocios y gobiernos"</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-card">
                <span class="timeline-time">4:40 – 5:00 pm</span>
                <p class="timeline-content"><strong>ESET NOD32, MSc. Daniel Romagoza</strong> — "IA y la Ciberseguridad"</p>
            </div>
        </div>
    </div>
</div>
@endsection
