<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Inscripción - Parroquia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h3>Actualizar Datos del Inscrito</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('inscritos.update', $inscrito->id) }}" method="POST">
                @csrf
                @method('PUT') 
                
                <div class="mb-3">
                    <label>Nombre del Joven:</label>
                    <input type="text" name="nombre_joven" class="form-control" value="{{ $inscrito->nombre_joven }}" required>
                </div>

                <div class="mb-3">
                    <label>Nombre del Responsable:</label>
                    <input type="text" name="nombre_responsable" class="form-control" value="{{ $inscrito->nombre_responsable }}" required>
                </div>

                <div class="mb-3">
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" value="{{ $inscrito->telefono }}" required>
                </div>

                <div class="mb-3">
                    <label>Edad:</label>
                    <input type="number" name="edad" class="form-control" value="{{ $inscrito->edad }}" required>
                </div>

                <div class="mb-3">
                    <label>Sacramento:</label>
                    <select name="sacramento_id" class="form-control" required>
                        @foreach($sacramentos as $sacramento)
                            <option value="{{ $sacramento->id }}" {{ $inscrito->sacramento_id == $sacramento->id ? 'selected' : '' }}>
                                {{ $sacramento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('inscritos.index') }}" class="btn btn-secondary">Regresar</a>
            </form>
        </div>
    </div>
</body>
</html>