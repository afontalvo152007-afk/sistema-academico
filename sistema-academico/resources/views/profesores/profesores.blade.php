@extends('layouts.app')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Profesores</h2>
        <a href="{{ route('profesores.crear') }}" class="btn btn-primary">+ Nuevo profesor</a>
    </div>

    <table class="table table-bordered bg-white">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th width="180">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($profesores as $profesor)
                <tr>
                    <td>{{ $profesor->id }}</td>
                    <td>{{ $profesor->nombre }}</td>
                    <td>{{ $profesor->apellido }}</td>
                    <td>{{ $profesor->correo }}</td>
                    <td>
                        <a href="{{ route('profesores.editar', $profesor) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('profesores.destroy', $profesor) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este profesor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay profesores registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
