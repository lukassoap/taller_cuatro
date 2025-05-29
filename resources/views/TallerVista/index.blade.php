<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado de Solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestor de Solicitudes</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3">Listado de Solicitudes</h1>
            <a class="btn btn-primary" href="{{ url('/solicitud/create') }}">Nueva Solicitud</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Tema</th>
                            <th>Área</th>
                            <th>Estado</th>
                            <th>Observaciones</th>
                            <th>Usuario Externo</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($solicitudes as $solicitud)
                            <tr>
                                <td>{{ $solicitud->id }}</td>
                                <td>{{ $solicitud->titulo }}</td>
                                <td>{{ $solicitud->descripcion }}</td>
                                <td>{{ $solicitud->tema }}</td>
                                <td>{{ $solicitud->area }}</td>
                                <td>{{ $solicitud->estado }}</td>
                                <td>{{ $solicitud->observaciones }}</td>
                                <td>{{ $solicitud->usuario_externo ? 'Sí' : 'No' }}</td>
                                <td>{{ \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ url('/solicitud/' . $solicitud->id . '/edit') }}" class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ url('/solicitud/' . $solicitud->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">No hay solicitudes registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
