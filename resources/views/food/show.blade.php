<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Alimento</title>
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

            --protein-color: #9c27b0;
            --carbs-color: #ff9800;
            --fat-color: #f44336;
            --vitamin-color: #4caf50;
            --mineral-color: #2196f3;
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

        .details-container {
            background-color: var(--card-bg);
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 2rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .details-container:hover {
            box-shadow: 0 12px 32px rgba(0,0,0,0.12);
        }

        .food-title {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1rem;
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

        .food-id {
            background-color: #e8f5e9;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            display: inline-block;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: var(--primary-dark);
            border: 1px solid #c8e6c9;
        }

        .nutrition-title {
            color: var(--primary);
            font-weight: 700;
            margin: 2rem 0 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nutrition-icon {
            background-color: var(--primary-light);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nutrition-summary {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 2rem;
        }

        .macro-card {
            flex: 1;
            min-width: 200px;
            background-color: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            border-top: 4px solid;
            transition: all 0.2s;
        }

        .macro-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .macro-card.protein {
            border-top-color: var(--protein-color);
        }

        .macro-card.carbs {
            border-top-color: var(--carbs-color);
        }

        .macro-card.fat {
            border-top-color: var(--fat-color);
        }

        .macro-card.energy {
            border-top-color: var(--secondary);
        }

        .macro-name {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--text-secondary);
        }

        .macro-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .nutrient-category {
            margin-bottom: 2rem;
            border-radius: 12px;
            padding: 1.5rem;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0,0,0,0.03);
        }

        .category-title {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .category-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--primary-light);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-vitamins .category-icon {
            background-color: var(--vitamin-color);
        }

        .category-minerals .category-icon {
            background-color: var(--mineral-color);
        }

        .category-macros .category-icon {
            background-color: var(--secondary);
        }

        .nutrient-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 10px;
        }

        .nutrient-item {
            border-left: 4px solid var(--primary);
            margin-bottom: 8px;
            transition: all 0.2s;
            padding: 12px;
            background-color: white;
            border-radius: 8px;
        }

        .nutrient-item:hover {
            background-color: rgba(96, 173, 94, 0.05);
            transform: translateX(5px);
        }

        .nutrient-item.protein {
            border-left-color: var(--protein-color);
        }

        .nutrient-item.carb {
            border-left-color: var(--carbs-color);
        }

        .nutrient-item.fat {
            border-left-color: var(--fat-color);
        }

        .nutrient-item.vitamin {
            border-left-color: var(--vitamin-color);
        }

        .nutrient-item.mineral {
            border-left-color: var(--mineral-color);
        }

        .nutrient-name {
            font-weight: 500;
        }

        .nutrient-value {
            font-weight: 600;
            color: var(--primary);
            background-color: #e8f5e9;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 0.9rem;
        }

        .nutrient-value.protein {
            background-color: #f3e5f5;
            color: var(--protein-color);
        }

        .nutrient-value.carb {
            background-color: #fff3e0;
            color: var(--carbs-color);
        }

        .nutrient-value.fat {
            background-color: #ffebee;
            color: var(--fat-color);
        }

        .nutrient-value.vitamin {
            background-color: #e8f5e9;
            color: var(--vitamin-color);
        }

        .nutrient-value.mineral {
            background-color: #e3f2fd;
            color: var(--mineral-color);
        }

        .back-button {
            background-color: var(--primary);
            border: none;
            border-radius: 50px;
            padding: 0.7rem 1.8rem;
            transition: all 0.3s;
            margin-top: 1.5rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-button:hover {
            background-color: var(--primary-dark);
            transform: translateX(-5px);
        }

        .print-button {
            background-color: var(--secondary);
            border: none;
            border-radius: 50px;
            padding: 0.7rem 1.8rem;
            transition: all 0.3s;
            margin-top: 1.5rem;
            font-weight: 500;
            margin-left: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .print-button:hover {
            background-color: var(--secondary-dark);
        }

        .empty-nutrients {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-icon {
            font-size: 3rem;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .nutrition-summary {
                flex-direction: column;
            }

            .macro-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5 app-container">
        <div class="details-container">
            <h1 class="food-title">
                <div class="title-icon"><i class="fas fa-utensils"></i></div>
                {{ $food['description'] }}
            </h1>

            <div class="food-id">
                <i class="fas fa-fingerprint me-2"></i>
                <strong>FDC ID:</strong> {{ $food['fdcId'] }}
            </div>

            @if (!empty($food['foodNutrients']))
                <!-- Nutrition Summary Cards for main macronutrients -->
                <div class="nutrition-summary">
                    @php
                        $energy = collect($food['foodNutrients'])->firstWhere('nutrient.name', 'Energy');
                        $protein = collect($food['foodNutrients'])->firstWhere('nutrient.name', 'Protein');
                        $carbs = collect($food['foodNutrients'])->firstWhere('nutrient.name', 'Carbohydrate, by difference');
                        $fat = collect($food['foodNutrients'])->firstWhere('nutrient.name', 'Total lipid (fat)');
                    @endphp

                    @if($energy)
                    <div class="macro-card energy">
                        <div class="macro-name">
                            <i class="fas fa-bolt"></i> Energía
                        </div>
                        <div class="macro-value">
                            {{ $energy['amount'] }} {{ $energy['nutrient']['unitName'] }}
                        </div>
                    </div>
                    @endif

                    @if($protein)
                    <div class="macro-card protein">
                        <div class="macro-name">
                            <i class="fas fa-dumbbell"></i> Proteínas
                        </div>
                        <div class="macro-value">
                            {{ $protein['amount'] }} {{ $protein['nutrient']['unitName'] }}
                        </div>
                    </div>
                    @endif

                    @if($carbs)
                    <div class="macro-card carbs">
                        <div class="macro-name">
                            <i class="fas fa-bread-slice"></i> Carbohidratos
                        </div>
                        <div class="macro-value">
                            {{ $carbs['amount'] }} {{ $carbs['nutrient']['unitName'] }}
                        </div>
                    </div>
                    @endif

                    @if($fat)
                    <div class="macro-card fat">
                        <div class="macro-name">
                            <i class="fas fa-oil-can"></i> Grasas
                        </div>
                        <div class="macro-value">
                            {{ $fat['amount'] }} {{ $fat['nutrient']['unitName'] }}
                        </div>
                    </div>
                    @endif
                </div>

                <div class="nutrition-section">
                    <h2 class="nutrition-title">
                        <div class="nutrition-icon">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        Información Nutricional Detallada
                    </h2>

                    @php
                        $macros = collect($food['foodNutrients'])->filter(function($item) {
                            return in_array($item['nutrient']['name'], [
                                'Protein', 'Carbohydrate, by difference', 'Total lipid (fat)',
                                'Fiber, total dietary', 'Sugars, total including NLEA', 'Energy'
                            ]);
                        });

                        $vitamins = collect($food['foodNutrients'])->filter(function($item) {
                            return strpos($item['nutrient']['name'], 'Vitamin') !== false;
                        });

                        $minerals = collect($food['foodNutrients'])->filter(function($item) {
                            return in_array($item['nutrient']['name'], [
                                'Calcium', 'Iron', 'Magnesium', 'Phosphorus', 'Potassium',
                                'Sodium', 'Zinc', 'Copper', 'Selenium', 'Manganese'
                            ]);
                        });

                        $others = collect($food['foodNutrients'])->filter(function($item) use ($macros, $vitamins, $minerals) {
                            return !$macros->contains('nutrient.id', $item['nutrient']['id']) &&
                                   !$vitamins->contains('nutrient.id', $item['nutrient']['id']) &&
                                   !$minerals->contains('nutrient.id', $item['nutrient']['id']);
                        });
                    @endphp

                    <!-- Macronutrients Section -->
                    <div class="nutrient-category category-macros">
                        <div class="category-title">
                            <div class="category-icon"><i class="fas fa-chart-pie"></i></div>
                            Macronutrientes
                        </div>
                        <div class="nutrition-grid">
                            @forelse ($macros as $nutrient)
                                @if (!empty($nutrient['nutrient']['name']) && !empty($nutrient['amount']) && !empty($nutrient['nutrient']['unitName']))
                                    @php
                                        $class = '';
                                        if (strpos($nutrient['nutrient']['name'], 'Protein') !== false) {
                                            $class = 'protein';
                                        } elseif (strpos($nutrient['nutrient']['name'], 'Carbohydrate') !== false || strpos($nutrient['nutrient']['name'], 'Fiber') !== false || strpos($nutrient['nutrient']['name'], 'Sugars') !== false) {
                                            $class = 'carb';
                                        } elseif (strpos($nutrient['nutrient']['name'], 'lipid') !== false || strpos($nutrient['nutrient']['name'], 'Fat') !== false) {
                                            $class = 'fat';
                                        }
                                    @endphp
                                    <div class="list-group-item nutrient-item {{ $class }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="nutrient-name">{{ $nutrient['nutrient']['name'] }}</span>
                                            <span class="nutrient-value {{ $class }}">
                                                {{ $nutrient['amount'] }} {{ $nutrient['nutrient']['unitName'] }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    No se encontraron datos de macronutrientes para este alimento.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Vitamins Section -->
                    <div class="nutrient-category category-vitamins">
                        <div class="category-title">
                            <div class="category-icon"><i class="fas fa-pills"></i></div>
                            Vitaminas
                        </div>
                        <div class="nutrition-grid">
                            @forelse ($vitamins as $nutrient)
                                @if (!empty($nutrient['nutrient']['name']) && !empty($nutrient['amount']) && !empty($nutrient['nutrient']['unitName']))
                                    <div class="list-group-item nutrient-item vitamin">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="nutrient-name">{{ $nutrient['nutrient']['name'] }}</span>
                                            <span class="nutrient-value vitamin">
                                                {{ $nutrient['amount'] }} {{ $nutrient['nutrient']['unitName'] }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    No se encontraron datos de vitaminas para este alimento.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Minerals Section -->
                    <div class="nutrient-category category-minerals">
                        <div class="category-title">
                            <div class="category-icon"><i class="fas fa-mountain"></i></div>
                            Minerales
                        </div>
                        <div class="nutrition-grid">
                            @forelse ($minerals as $nutrient)
                                @if (!empty($nutrient['nutrient']['name']) && !empty($nutrient['amount']) && !empty($nutrient['nutrient']['unitName']))
                                    <div class="list-group-item nutrient-item mineral">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="nutrient-name">{{ $nutrient['nutrient']['name'] }}</span>
                                            <span class="nutrient-value mineral">
                                                {{ $nutrient['amount'] }} {{ $nutrient['nutrient']['unitName'] }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    No se encontraron datos de minerales para este alimento.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Other Nutrients Section -->
                    <div class="nutrient-category">
                        <div class="category-title">
                            <div class="category-icon"><i class="fas fa-flask"></i></div>
                            Otros Nutrientes
                        </div>
                        <div class="nutrition-grid">
                            @forelse ($others as $nutrient)
                                @if (!empty($nutrient['nutrient']['name']) && !empty($nutrient['amount']) && !empty($nutrient['nutrient']['unitName']))
                                    <div class="list-group-item nutrient-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="nutrient-name">{{ $nutrient['nutrient']['name'] }}</span>
                                            <span class="nutrient-value">
                                                {{ $nutrient['amount'] }} {{ $nutrient['nutrient']['unitName'] }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    No se encontraron otros datos nutricionales para este alimento.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-nutrients">
                    <div class="empty-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h4>No hay información nutricional disponible</h4>
                    <p class="text-muted">No se encontraron datos nutricionales para este alimento.</p>
                </div>
            @endif

            <div class="d-flex flex-wrap">
                <a href="{{ route('food.search') }}" class="btn back-button">
                    <i class="fas fa-arrow-left"></i> Volver a buscar
                </a>
                <button onclick="window.print()" class="btn print-button">
                    <i class="fas fa-print"></i> Imprimir información
                </button>
            </div>
        </div>
    </div>
</body>
</html>
