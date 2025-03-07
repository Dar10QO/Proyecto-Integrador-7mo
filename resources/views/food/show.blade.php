<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Alimento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .details-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .food-title {
            color: #198754;
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.75rem;
        }
        .food-id {
            background-color: #e9ecef;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            display: inline-block;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }
        .nutrition-title {
            color: #198754;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e9ecef;
            display: flex;
            align-items: center;
        }
        .nutrition-icon {
            background-color: #e9ecef;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: #198754;
        }
        .nutrient-item {
            border-left: 4px solid #198754;
            margin-bottom: 8px;
            transition: all 0.2s;
        }
        .nutrient-item:hover {
            background-color: #f8f9fa;
        }
        .nutrient-name {
            font-weight: 500;
        }
        .nutrient-value {
            font-weight: 600;
            color: #198754;
        }
        .back-button {
            background-color: #198754;
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s;
            margin-top: 1.5rem;
        }
        .back-button:hover {
            background-color: #146c43;
            transform: translateX(-5px);
        }
        .nutrition-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="details-container">
            <h1 class="food-title">{{ $food['description'] }}</h1>
            <div class="food-id">
                <i class="fas fa-fingerprint me-2"></i>
                <strong>FDC ID:</strong> {{ $food['fdcId'] }}
            </div>

            <div class="nutrition-section">
                <h2 class="nutrition-title">
                    <div class="nutrition-icon">
                        <i class="fas fa-apple-alt"></i>
                    </div>
                    Información Nutricional
                </h2>

                @if (!empty($food['foodNutrients']))
                    <div class="nutrition-grid">
                        @foreach ($food['foodNutrients'] as $nutrient)
                            @if (!empty($nutrient['nutrient']['name']) && !empty($nutrient['amount']) && !empty($nutrient['nutrient']['unitName']))
                                <div class="list-group-item nutrient-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="nutrient-name">{{ $nutrient['nutrient']['name'] }}:</span>
                                        <span class="nutrient-value">
                                            {{ $nutrient['amount'] }} {{ $nutrient['nutrient']['unitName'] }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        No se encontraron datos nutricionales para este alimento.
                    </div>
                @endif
            </div>

            <a href="{{ route('food.search') }}" class="btn back-button">
                <i class="fas fa-arrow-left me-2"></i> Volver a buscar
            </a>
        </div>
    </div>
</body>
</html>
