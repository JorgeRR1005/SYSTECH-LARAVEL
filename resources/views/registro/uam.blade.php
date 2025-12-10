@extends('layouts.app')

@section('content')
<style>
    .registro-container {
        max-width: 550px;
        margin: 0 auto;
        animation: fadeInUp 0.6s ease forwards;
    }

    .registro-card {
        background: linear-gradient(145deg, rgba(15, 26, 34, 0.8), rgba(15, 26, 34, 0.5));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 102, 0, 0.15);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 
            0 4px 30px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
    }

    .registro-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .registro-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, rgba(255, 102, 0, 0.2), rgba(255, 102, 0, 0.1));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem auto;
    }

    .registro-icon svg {
        width: 28px;
        height: 28px;
        color: #ff6600;
    }

    .registro-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .registro-title .highlight {
        color: #ff6600;
    }

    .registro-subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.9rem;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.8);
    }

    .form-control {
        width: 100%;
        padding: 0.875rem 1rem;
        font-size: 0.95rem;
        color: #fff;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.4);
    }

    .form-control:focus {
        outline: none;
        border-color: #ff6600;
        background: rgba(255, 102, 0, 0.05);
        box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.15);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    /* Submit Button */
    .btn-submit {
        width: 100%;
        padding: 1rem;
        font-size: 1rem;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(135deg, #ff6600, #ff8533);
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 0.5rem;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 102, 0, 0.4);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    /* Success Alert */
    .alert-success-custom {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #4ade80;
        padding: 1rem;
        border-radius: 10px;
        margin-top: 1.5rem;
        text-align: center;
        font-weight: 500;
        animation: fadeInUp 0.4s ease forwards;
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
    @media (max-width: 576px) {
        .registro-card {
            padding: 1.75rem;
            margin: 0 0.5rem;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="registro-container">
    <div class="registro-card">
        <div class="registro-header">
            <div class="registro-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h1 class="registro-title">
                Registro <span class="highlight">Estudiantes UAM</span>
            </h1>
            <p class="registro-subtitle">Complete el formulario para inscribirse al evento</p>
        </div>

        <form action="{{ route('registro.uam.store') }}" method="POST">
            @csrf
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="Ingrese sus nombres" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" required>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label">Correo institucional</label>
                <input type="email" name="correo" class="form-control" placeholder="ejemplo@uam.edu.ni" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">CIF</label>
                <input type="text" name="identificador" class="form-control" placeholder="Ingrese su CIF" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Talla de camiseta</label>
                    <input type="text" name="talla" class="form-control" placeholder="S, M, L, XL..." required>
                </div>
                <div class="form-group">
                    <label class="form-label">Número de recibo</label>
                    <input type="text" name="recibo" class="form-control" placeholder="No. de recibo" required>
                </div>
            </div>
            
            <button type="submit" class="btn-submit">
                Confirmar registro
            </button>

            @if(session('success'))
                <div class="alert-success-custom">
                    ✓ {{ session('success') }}
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
