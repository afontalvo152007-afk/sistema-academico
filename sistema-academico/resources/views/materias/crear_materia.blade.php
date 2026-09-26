@extends('layouts.app')

@section('contenido')
    <h2>Registrar materia</h2>

    <form action="{{ route('materias.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Créditos</label>
            <input type="number" name="creditos" class="form-control" min="1" max="20" value="{{ old('creditos') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
