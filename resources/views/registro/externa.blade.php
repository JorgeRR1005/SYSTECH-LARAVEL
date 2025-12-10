@extends('layouts.app')

@section('content')
<style>
    .registro {
        background-color: #0f1a22;
        color: #fff;
        padding: 3rem 2rem;
        border-radius: 12px;
        max-width: 700px;
        margin: 3rem auto;
    }
    .registro h2 {
        color: #ff6600;
        text-align: center;
        margin-bottom: 2rem;
        font-weight: 700;
    }
    .btn-systech {
        background-color: #ff6600;
        color: #fff;
    }
</style>

<div class="registro">
    <h2>Registro Comunidad Externa</h2>

    <form action="{{ route('registro.externa.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
            </div>
            <div class="col">
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
            </div>
        </div>
        <input type="email" name="correo" class="form-control mb-3" placeholder="Correo electrónico" required>
        <input type="text" name="identificador" class="form-control mb-3" placeholder="Cédula (sin guiones)" required>
        <input type="text" name="talla" class="form-control mb-3" placeholder="Talla de camiseta" required>
        <input type="text" name="recibo" class="form-control mb-3" placeholder="Número de recibo" required>
        <button type="submit" class="btn btn-systech w-100">Confirmar registro</button>

        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
    </form>
</div>
@endsection
