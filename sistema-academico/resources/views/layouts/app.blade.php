<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema Académico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('estudiantes.index') }}">Sistema Académico</a>
            <div class="navbar-nav">
                <a class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active fw-bold text-white' : 'text-white-50' }}" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                <a class="nav-link {{ request()->routeIs('profesores.*') ? 'active fw-bold text-white' : 'text-white-50' }}" href="{{ route('profesores.index') }}">Profesores</a>
                <a class="nav-link {{ request()->routeIs('materias.*') ? 'active fw-bold text-white' : 'text-white-50' }}" href="{{ route('materias.index') }}">Materias</a>
            </div>
        </div>
    </nav>

    <div class="container">

        @if (session('mensaje'))
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('contenido')

    </div>

</body>
</html>
