@extends('layouts.app')

@section('content')
<div class="container text-white">
    <h2 class="mb-4">Gestión de Inscripciones</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-dark table-striped align-middle">
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
                <td>{{ $ins->id }}</td>
                <td>{{ $ins->nombres }} {{ $ins->apellidos }}</td>
                <td>{{ $ins->correo }}</td>
                <td>{{ $ins->tipo_usuario }}</td>

                <td>
                    <span class="badge 
                        @if($ins->estado->nombre() == 'pendiente') bg-warning 
                        @elseif($ins->estado->nombre() == 'confirmada') bg-success 
                        @else bg-danger @endif">

                        {{ ucfirst($ins->estado->nombre()) }}

                    </span>
                </td>

                <td>
                    <form action="{{ route('admin.confirmar', $ins->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success btn-sm">Confirmar</button>
                    </form>

                    <form action="{{ route('admin.cancelar', $ins->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm">Cancelar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
