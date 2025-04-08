<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Fitness App'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Alertify CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/themes/default.css">
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        green: {
                            '50': '#f0fdf4',
                            '100': '#dcfce7',
                            '200': '#bbf7d0',
                            '300': '#86efac',
                            '400': '#4ade80',
                            '500': '#22c55e',
                            '600': '#16a34a',
                            '700': '#15803d',
                            '800': '#166534',
                            '900': '#14532d',
                        },
                    }
                }
            }
        }
    </script>

    <!-- Custom Styles -->
    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="bg-gray-50 min-h-screen font-sans antialiased flex flex-col">
    <header class="bg-green-700 text-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold">Fitness App</a>

                <nav class="flex space-x-4">
                    <a href="{{ route('ejercicios.index') }}" class="hover:text-green-200 transition-colors duration-200">Ejercicios</a>
                </nav>
            </div>
        </div>
    </header>

    <div class="flex-grow">
        @include('layouts.navigation')

        <main>
            @yield('content', $slot)
        </main>
    </div>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} Fitness App. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
