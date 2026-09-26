@extends('layouts.app')

@section('contenido')
    <h2>Editar materia</h2>

    <form action="{{ route('materias.update', $materia) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $materia->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Créditos</label>
            <input type="number" name="creditos" class="form-control" min="1" max="20" value="{{ old('creditos', $materia->creditos) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
