<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Ejercicios (API)</title>
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
            transition: transform 0.3s ease;
            margin-bottom: 20px;
            overflow: hidden;
            height: auto;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            padding: 15px;
            font-size: 1.2rem;
        }
        .card-img-container {
            height: 260px;
            overflow: hidden;
            position: relative;
            background-color: #f8f9fa;
        }
        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }
        .badge {
            background-color: var(--secondary-color);
            color: white;
            font-size: 0.9rem;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }
        .btn-primary:hover {
            background-color: #0066cc;
        }
        .filter-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
            min-height: 150px;
        }
        .card-descripcion {
            margin-top: 10px;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        .api-badge {
            background-color: #28a745;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PowerFit</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ejercicios.index') }}">Biblioteca de Ejercicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('ejercicios.api.index') }}">Biblioteca API</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Biblioteca de Ejercicios (API)</h1>

        @if(isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @endif

        <div class="filter-container">
            <form action="{{ route('ejercicios.api.index') }}" method="GET" class="row g-3">
                <div class="col-md-10">
                    <select name="grupo_muscular_id" class="form-select">
                        <option value="">Todos los grupos musculares</option>
                        @foreach($gruposMusculares as $grupo)
                            <option value="{{ $grupo->id }}" {{ request('grupo_muscular_id') == $grupo->id ? 'selected' : '' }}>
                                {{ $grupo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </form>
        </div>

        <div class="row">
            @forelse($ejercicios as $ejercicio)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <span class="badge rounded-pill api-badge">API</span>
                        <div class="card-header">{{ $ejercicio['nombre'] }}</div>
                        <div class="card-img-container">
                            @if(isset($ejercicio['ruta_imagen']) && $ejercicio['ruta_imagen'])
                                <img src="{{ asset($ejercicio['ruta_imagen']) }}" class="card-img-top" alt="{{ $ejercicio['nombre'] }}">
                            @else
                                <img src="{{ asset('images/default-exercise.jpg') }}" class="card-img-top" alt="{{ $ejercicio['nombre'] }}">
                            @endif
                        </div>
                        <div class="card-body">
                            <span class="badge rounded-pill mb-2">{{ $ejercicio['grupo_muscular']['nombre'] }}</span>
                            <div class="card-descripcion">
                                {{ $ejercicio['descripcion'] }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No se encontraron ejercicios.</div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
