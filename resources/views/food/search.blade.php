<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Alimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2e7d32;
            --primary-light: #60ad5e;
            --primary-dark: #005005;
            --secondary: #0097a7;
            --secondary-light: #56c8d8;
            --secondary-dark: #006978;
            --background: #f5f7fa;
            --card-bg: #ffffff;
            --text-primary: #212121;
            --text-secondary: #757575;
            --border: #e0e0e0;
        }

        body {
            background-color: var(--background);
            color: var(--text-primary);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .app-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .search-container {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 2rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .search-container:hover {
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }

        .page-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--border);
            padding-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .title-icon {
            background-color: var(--primary-light);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-form {
            position: relative;
        }

        .search-input {
            border-radius: 50px;
            padding: 12px 20px;
            border: 2px solid var(--border);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding-right: 120px;
            height: 56px;
            transition: all 0.3s;
            font-size: 1.1rem;
        }

        .search-input:focus {
            box-shadow: 0 0 0 4px rgba(46, 125, 50, 0.2);
            border-color: var(--primary);
        }

        .search-button {
            position: absolute;
            right: 5px;
            top: 5px;
            border-radius: 50px;
            height: 46px;
            width: 110px;
            background-color: var(--primary);
            border: none;
            transition: all 0.3s;
            font-weight: 500;
        }

        .search-button:hover {
            background-color: var(--primary-dark);
            transform: translateX(-3px);
        }

        .food-counter {
            color: var(--text-secondary);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .results-container {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .results-container:hover {
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }

        .results-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--border);
            padding-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .food-item {
            border-left: 4px solid var(--primary);
            margin-bottom: 12px;
            transition: all 0.2s;
            padding: 16px;
            border-radius: 8px;
        }

        .food-item:hover {
            transform: translateX(5px);
            background-color: rgba(96, 173, 94, 0.05);
        }

        .food-name {
            font-weight: 600;
            color: var(--text-primary);
            font-size: 1.05rem;
        }

        .food-id {
            color: var(--text-secondary);
            font-size: 0.85rem;
            margin-top: 4px;
        }

        .details-button {
            background-color: var(--secondary);
            border: none;
            border-radius: 50px;
            transition: all 0.3s;
            padding: 6px 14px;
            color: white;
            font-weight: 500;
        }

        .details-button:hover {
            background-color: var(--secondary-dark);
            transform: translateX(-3px);
        }

        .empty-results {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-icon {
            font-size: 3rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .search-tips {
            background-color: #e8f5e9;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
            border-left: 4px solid var(--primary);
        }

        .tips-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-dark);
        }

        .tips-list {
            margin-bottom: 0;
            padding-left: 1.5rem;
        }

        .tips-list li {
            margin-bottom: 0.5rem;
        }

        .tips-list li:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 576px) {
            .search-input {
                padding-right: 20px;
            }

            .search-button {
                position: relative;
                width: 100%;
                margin-top: 10px;
                right: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5 app-container">
        <div class="search-container">
            <h1 class="page-title">
                <div class="title-icon"><i class="fas fa-search"></i></div>
                Buscar Alimentos
            </h1>

            <form method="GET" action="{{ route('food.search') }}" class="search-form mb-4">
                <input type="text" name="query" class="form-control search-input" placeholder="Ingrese el nombre del alimento (ej: manzana, leche, arroz)" value="{{ request()->query('query') ?? '' }}">
                <button type="submit" class="btn search-button">
                    <i class="fas fa-search me-1"></i> Buscar
                </button>
            </form>

            <div class="search-tips">
                <div class="tips-title"><i class="fas fa-lightbulb me-2"></i>Consejos de búsqueda</div>
                <ul class="tips-list">
                    <li>Utiliza términos específicos para mejores resultados</li>
                    <li>Puedes buscar por nombres genéricos (ej: "manzana") o más específicos (ej: "manzana roja")</li>
                    <li>No es necesario incluir acentos en la búsqueda</li>
                </ul>
            </div>
        </div>

        @if(isset($foods))
        <div class="results-container">
            <h2 class="results-title">
                <div class="title-icon"><i class="fas fa-list"></i></div>
                Resultados
            </h2>

            @if(count($foods) > 0)
                <div class="food-counter">
                    <i class="fas fa-check-circle me-1"></i>
                    Se encontraron <strong>{{ count($foods) }}</strong> alimentos para "{{ request()->query('query') }}"
                </div>

                <div class="list-group">
                    @foreach ($foods as $food)
                        <div class="list-group-item food-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="food-name">{{ $food['description'] }}</div>
                                    <div class="food-id"><i class="fas fa-tag me-1"></i>FDC ID: {{ $food['fdcId'] }}</div>
                                </div>
                                <a href="{{ route('food.show', ['fdcId' => $food['fdcId']]) }}" class="btn details-button">
                                    <i class="fas fa-info-circle me-1"></i> Ver detalles
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-results">
                    <div class="empty-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>No se encontraron alimentos</h4>
                    <p class="text-muted">Intenta con otros términos de búsqueda o revisa los consejos de búsqueda.</p>
                </div>
            @endif
        </div>
        @endif
    </div>
</body>
</html>
