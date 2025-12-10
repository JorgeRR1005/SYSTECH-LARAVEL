@extends('layouts.app')

@section('content')
<style>
    .admin-container {
        animation: fadeInUp 0.6s ease forwards;
    }

    .admin-header {
        margin-bottom: 2rem;
    }

    .admin-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .admin-title .highlight {
        color: #ff6600;
    }

    .admin-subtitle {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.9rem;
    }

    /* Table Container */
    .table-container {
        background: linear-gradient(145deg, rgba(15, 26, 34, 0.8), rgba(15, 26, 34, 0.5));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
    }

    /* Modern Table */
    .table-modern {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .table-modern thead {
        background: rgba(255, 102, 0, 0.1);
    }

    .table-modern th {
        padding: 1rem;
        text-align: left;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #ff6600;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .table-modern td {
        padding: 1rem;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.85);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        vertical-align: middle;
    }

    .table-modern tbody tr {
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover {
        background: rgba(255, 102, 0, 0.05);
    }

    .table-modern tbody tr:last-child td {
        border-bottom: none;
    }

    /* Badges */
    .badge-status {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 20px;
        text-transform: capitalize;
    }

    .badge-pendiente {
        background: linear-gradient(135deg, rgba(234, 179, 8, 0.2), rgba(234, 179, 8, 0.1));
        color: #fbbf24;
        border: 1px solid rgba(234, 179, 8, 0.3);
    }

    .badge-confirmada {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.1));
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .badge-cancelada {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.1));
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    /* Action Buttons */
    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.4rem 0.75rem;
        font-size: 0.8rem;
        font-weight: 500;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-action svg {
        width: 14px;
        height: 14px;
    }

    .btn-confirm {
        background: rgba(34, 197, 94, 0.15);
        color: #4ade80;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .btn-confirm:hover {
        background: #22c55e;
        color: #fff;
        border-color: #22c55e;
    }

    .btn-cancel {
        background: rgba(239, 68, 68, 0.15);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
        margin-left: 0.5rem;
    }

    .btn-cancel:hover {
        background: #ef4444;
        color: #fff;
        border-color: #ef4444;
    }

    /* Success Alert */
    .alert-success-custom {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #4ade80;
        padding: 1rem 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
        font-weight: 500;
        animation: fadeInUp 0.4s ease forwards;
    }

    /* Tipo badge */
    .badge-tipo {
        display: inline-block;
        padding: 0.25rem 0.6rem;
        font-size: 0.7rem;
        font-weight: 500;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.08);
        color: rgba(255, 255, 255, 0.7);
        text-transform: uppercase;
        letter-spacing: 0.3px;
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
        .table-container {
            overflow-x: auto;
        }
        
        .table-modern {
            min-width: 700px;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | PATRÓN ARQUITECTÓNICO: LAZY LOAD
    |--------------------------------------------------------------------------
    | Estilos para la paginación que permite cargar datos bajo demanda.
    */
    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        margin-top: 2rem;
        padding: 1rem;
    }

    .pagination-container nav {
        display: flex;
        gap: 0.25rem;
    }

    .pagination-container a,
    .pagination-container span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 500;
        border-radius: 8px;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .pagination-container a {
        background: rgba(255, 255, 255, 0.05);
        color: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .pagination-container a:hover {
        background: rgba(255, 102, 0, 0.15);
        color: #ff6600;
        border-color: rgba(255, 102, 0, 0.3);
    }

    .pagination-container span[aria-current="page"] span {
        background: linear-gradient(135deg, #ff6600, #ff8533);
        color: #fff;
        border: none;
    }

    .pagination-container span[aria-disabled="true"] span {
        background: rgba(255, 255, 255, 0.02);
        color: rgba(255, 255, 255, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.05);
        cursor: not-allowed;
    }

    .pagination-info {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.85rem;
    }
</style>

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">
            Gestión de <span class="highlight">Inscripciones</span>
        </h1>
        <p class="admin-subtitle">Panel de administración SYSTECH 2025</p>
    </div>

    @if(session('success'))
        <div class="alert-success-custom">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table class="table-modern">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($inscripciones as $ins)
                <tr>
                    <td><strong>#{{ $ins->id }}</strong></td>
                    <td>{{ $ins->nombres }} {{ $ins->apellidos }}</td>
                    <td>{{ $ins->correo }}</td>
                    <td><span class="badge-tipo">{{ $ins->tipo_usuario }}</span></td>
                    <td>
                        @php $estado = $ins->estado->nombre(); @endphp
                        <span class="badge-status badge-{{ $estado }}">
                            {{ ucfirst($estado) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('admin.confirmar', $ins->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-action btn-confirm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Confirmar
                            </button>
                        </form>

                        <form action="{{ route('admin.cancelar', $ins->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-action btn-cancel">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Cancelar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- 
    |--------------------------------------------------------------------------
    | PATRÓN ARQUITECTÓNICO: LAZY LOAD
    |--------------------------------------------------------------------------
    | Paginación para cargar datos bajo demanda (15 registros por página).
    | Esto evita cargar todos los registros en memoria.
    --}}
    @if($inscripciones->hasPages())
    <div class="pagination-container">
        <span class="pagination-info">
            Mostrando {{ $inscripciones->firstItem() }} - {{ $inscripciones->lastItem() }} 
            de {{ $inscripciones->total() }} inscripciones
        </span>
        {{ $inscripciones->links() }}
    </div>
    @endif
</div>
@endsection
