<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Alimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .search-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .page-title {
            color: #198754;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.75rem;
        }
        .search-form {
            position: relative;
        }
        .search-input {
            border-radius: 50px;
            padding-left: 20px;
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            padding-right: 120px;
            height: 50px;
            transition: all 0.3s;
        }
        .search-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
            border-color: #198754;
        }
        .search-button {
            position: absolute;
            right: 5px;
            top: 5px;
            border-radius: 50px;
            height: 40px;
            width: 100px;
            background-color: #198754;
            border: none;
            transition: all 0.3s;
        }
        .search-button:hover {
            background-color: #146c43;
        }
        .results-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 2rem;
        }
        .results-title {
            color: #198754;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.75rem;
        }
        .food-item {
            border-left: 4px solid #198754;
            margin-bottom: 10px;
            transition: all 0.2s;
        }
        .food-item:hover {
            transform: translateX(5px);
        }
        .food-name {
            font-weight: 600;
            color: #343a40;
        }
        .food-id {
            color: #6c757d;
            font-size: 0.85rem;
        }
        .details-button {
            background-color: #0dcaf0;
            border: none;
            border-radius: 50px;
            transition: all 0.3s;
        }
        .details-button:hover {
            background-color: #0aa1c0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="search-container">
            <h1 class="page-title"><i class="fas fa-search me-2"></i>Buscar Alimentos</h1>

            <form method="GET" action="{{ route('food.search') }}" class="search-form mb-3">
                <input type="text" name="query" class="form-control search-input" placeholder="Ingrese el nombre del alimento">
                <button type="submit" class="btn btn-primary search-button">
                    <i class="fas fa-search me-1"></i> Buscar
                </button>
            </form>
        </div>

        @if(!empty($foods))
        <div class="results-container">
            <h2 class="results-title"><i class="fas fa-list me-2"></i>Resultados</h2>
            <div class="list-group">
                @foreach ($foods as $food)
                    <div class="list-group-item food-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="food-name">{{ $food['description'] }}</div>
                                <div class="food-id">FDC ID: {{ $food['fdcId'] }}</div>
                            </div>
                            <a href="{{ route('food.show', ['fdcId' => $food['fdcId']]) }}" class="btn btn-sm details-button">
                                <i class="fas fa-info-circle me-1"></i> Ver detalles
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</body>
</html>
