<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nueva Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestor de Solicitudes</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="h3 mb-4">Crear Nueva Solicitud</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('taller.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" id="titulo" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" id="descripcion" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tema" class="form-label">Tema</label>
                <input type="text" name="tema" class="form-control" id="tema" required>
            </div>

            <div class="mb-3">
                <label for="area" class="form-label">Área</label>
                <select name="area" id="area" class="form-select" required>
                    <option value="">Seleccione un área</option>
                    <option value="TI">TI</option>
                    <option value="CONT">CONT</option>
                    <option value="ADM">ADM</option>
                    <option value="OPERT">OPERT</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="">Seleccione un estado</option>
                    <option value="solicitado">Solicitado</option>
                    <option value="despachado">Despachado</option>
                    <option value="rechazado">Rechazado</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" id="observaciones" rows="2"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario Externo</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usuario_externo" id="externo_si" value="1" required>
                        <label class="form-check-label" for="externo_si">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usuario_externo" id="externo_no" value="0" required>
                        <label class="form-check-label" for="externo_no">No</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Guardar Solicitud</button>
            <a href="{{ route('taller.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
