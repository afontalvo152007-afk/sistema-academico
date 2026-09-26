@extends('layouts.app')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Estudiantes</h2>
        <a href="{{ route('estudiantes.crear') }}" class="btn btn-primary">+ Nuevo estudiante</a>
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
            @forelse ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>
                        <a href="{{ route('estudiantes.editar', $estudiante) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este estudiante?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay estudiantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
