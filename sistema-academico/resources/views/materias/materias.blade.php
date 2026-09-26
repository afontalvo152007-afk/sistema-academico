@extends('layouts.app')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Materias</h2>
        <a href="{{ route('materias.crear') }}" class="btn btn-primary">+ Nueva materia</a>
    </div>

    <table class="table table-bordered bg-white">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Créditos</th>
                <th width="180">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($materias as $materia)
                <tr>
                    <td>{{ $materia->id }}</td>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->creditos }}</td>
                    <td>
                        <a href="{{ route('materias.editar', $materia) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('materias.destroy', $materia) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta materia?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay materias registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
