@extends('layouts.app')

@section('content')
<style>
    /* Estilos inspirados en la página oficial de SYSTECH 2025 */

    /* Hero con imagen y superposición oscura */
    .hero {
        background: url('{{ asset('img/hero.png') }}') center/cover no-repeat;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        position: relative;
    }
    .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6); /* superposición para contraste */
    }
    .hero-content { position: relative; z-index: 2; max-width: 900px; }
    .hero-heading span { color: #ff6600; } /* palabra SYSTECH resaltada */

    /* Contenedor oscuro con sombra y bordes redondeados */
    .section {
        background-color: #041c32;
        color: #fff;
        padding: 4rem 2rem;
        border-radius: 1rem;
        margin: 3rem auto;
        max-width: 1000px;
        box-shadow: 0 0 20px rgba(0,0,0,0.4);
    }
    .section .section-divider {
        width: 120px; height: 3px;
        background-color: #ff6600;
        margin: 2rem auto 0 auto;
    }
    h1, h2 { font-weight: 700; }
    .text-orange { color: #ff6600; }

    /* Botones outline en naranja */
    .btn-cta {
        background: transparent;
        border: 2px solid #ff6600;
        color: #ff6600;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        transition: background-color 0.3s, color 0.3s;
    }
    .btn-cta:hover {
        background-color: #ff6600;
        color: #fff;
    }
</style>

<div class="hero">
    <div class="hero-content">
        <h1 class="display-4 fw-bold hero-heading">
            <span>SYSTECH 2025</span> fue un éxito rotundo
        </h1>
        <p class="lead">
            La Universidad Americana agradece a cada participante que formó parte de esta experiencia de innovación y aprendizaje.
        </p>
    </div>
</div>

<section class="section">
    <h2 class="text-center mb-4">
        ¿Qué es <span class="text-orange">SYSTECH</span>?
    </h2>
    <p class="fs-5 text-center">
        <span class="text-orange">SYSTECH</span> es el Congreso Nacional de Ingeniería en Sistemas de Información impulsado por la
        <strong>Universidad Americana (UAM)</strong>. Desde su primera edición en 2023, ha servido como espacio de encuentro para que la comunidad académica y profesional comparta ideas, avances y experiencias tecnológicas.
    </p>
    <p class="fs-5 text-center">
        Este congreso se celebra anualmente con el propósito de fomentar la innovación, la formación práctica y el pensamiento crítico en áreas como el desarrollo, la ciberseguridad, la automatización y la transformación digital.
    </p>
    <div class="section-divider"></div>
    <div class="mt-5 text-center">
        <a href="{{ route('registro.uam') }}" class="btn btn-cta me-3">
            Registrarme (Estudiantes UAM)
        </a>
        <a href="{{ route('registro.externa') }}" class="btn btn-cta">
            Registrarme (Comunidad Externa)
        </a>
    </div>
</section>
@endsection
