<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ejercicio['nombre'] }} - PowerFit API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a8cff;
            --secondary-color: #ff6b6b;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
        }

        body {
            background-color: #f0f2f5;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: var(--primary-color);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            padding: 15px;
            font-size: 1.4rem;
        }

        .img-container {
            height: 400px;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .img-container img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        .badge {
            background-color: var(--secondary-color);
            color: white;
            font-size: 1rem;
            padding: 8px 15px;
        }

        .descripcion {
            margin-top: 20px;
            line-height: 1.7;
            font-size: 1.1rem;
        }

        .api-badge {
            background-color: #28a745;
            color: white;
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PowerFit API</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ejercicios.index') }}">Biblioteca Local</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('api.ejercicios.index') }}">Biblioteca API</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-5">
        <div class="mb-3">
            <a href="{{ route('api.ejercicios.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Volver a la lista
            </a>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                {{ $ejercicio['nombre'] }}
                <span class="api-badge">Datos desde API</span>
            </div>

            <div class="img-container">
                @if(isset($ejercicio['ruta_imagen']) && $ejercicio['ruta_imagen'])
                    <img src="{{ asset($ejercicio['ruta_imagen']) }}" alt="{{ $ejercicio['nombre'] }}">
                @else
                    <img src="{{ asset('images/default-exercise.jpg') }}" alt="{{ $ejercicio['nombre'] }}">
                @endif
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="badge rounded-pill mb-3">{{ $ejercicio['grupo_muscular']['nombre'] }}</span>
                    @if(isset($ejercicio['categoria']) && $ejercicio['categoria'])
                        <span class="text-muted">Categoría: {{ $ejercicio['categoria'] }}</span>
                    @endif
                </div>

                <div class="descripcion">
                    {{ $ejercicio['descripcion'] }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
