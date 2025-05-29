<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Editar Solicitud</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('taller.update', $solicitud->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $solicitud->titulo) }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $solicitud->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tema" class="form-label">Tema</label>
                <input type="text" class="form-control" id="tema" name="tema" value="{{ old('tema', $solicitud->tema) }}" required>
            </div>

            <div class="mb-3">
                <label for="area" class="form-label">Área</label>
                <select class="form-select" id="area" name="area" required>
                    @foreach (['TI', 'CONT', 'ADM', 'OPERT'] as $option)
                        <option value="{{ $option }}" {{ $solicitud->area === $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    @foreach (['solicitado', 'despachado', 'rechazado'] as $option)
                        <option value="{{ $option }}" {{ $solicitud->estado === $option ? 'selected' : '' }}>{{ ucfirst($option) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea class="form-control" id="observaciones" name="observaciones" rows="3">{{ old('observaciones', $solicitud->observaciones) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="usuario_externo" class="form-label">Usuario Externo</label>
                <select class="form-select" id="usuario_externo" name="usuario_externo" required>
                    <option value="1" {{ $solicitud->usuario_externo ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$solicitud->usuario_externo ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('taller.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
