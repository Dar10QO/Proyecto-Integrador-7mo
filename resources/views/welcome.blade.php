<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cuidate Divirtiendote</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* Tailwind CSS inline */
                /* ... (mantén el mismo CSS de Tailwind que ya tienes) ... */
            </style>
        @endif
        
        <style>
            /* Efectos personalizados */
            .fitness-gradient {
                background: linear-gradient(135deg,rgb(68, 151, 89) 0%,rgb(86, 165, 112) 50%,rgb(82, 150, 113) 100%);
            }
            .card-hover {
                transition: all 0.3s ease;
            }
            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
            .pulse-animation {
                animation: pulse 2s infinite;
            }
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <!-- Fondo de pantalla completa -->
        <div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat" 
             style="background-image: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=90'); opacity: 0.2;">
        </div>

        <div class="relative min-h-screen flex flex-col">
            <!-- Barra de navegación -->
            <nav class="bg-white bg-opacity-90 backdrop-blur-sm shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 flex items-center">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-r from-green-500 to-blue-500 flex items-center justify-center">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <span class="ml-2 text-xl font-bold text-gray-900">Cuidate Divirtiendote</span>
                            </div>
                        </div>
                        <div class="flex items-center">
                            @if (Route::has('login'))
                                <div class="ml-4 flex items-center md:ml-6">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 transition duration-150">
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 transition duration-150">
                                            Iniciar sesión
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 px-4 py-2 rounded-md text-sm font-medium text-white bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 transition duration-150">
                                            Registrarse
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <header class="relative py-20 overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="relative z-10 text-center">
                        <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                            Transforma tu cuerpo, mente y vida</span>
                        </h1>
                        <p class="mt-6 text-xl text-gray-600 max-w-3xl mx-auto">
                            Únete a nuestra comunidad fitness y descubre el poder de un estilo de vida saludable con nuestros programas personalizados.
                        </p>
                        <div class="mt-10 flex justify-center gap-4">
                            <a href="{{ route('register') }}" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 md:py-4 md:text-lg md:px-10 transition duration-300 transform hover:scale-105">
                                Comienza ahora
                            </a>
                            <a href="#features" class="px-8 py-3 border border-transparent text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition duration-300 transform hover:scale-105">
                                Conoce más
                            </a>
                        </div>
                    </div>
                </div>
                <div class="absolute top-0 left-0 right-0 bottom-0 overflow-hidden opacity-10">
                    <div class="absolute -top-32 -left-32 w-64 h-64 bg-green-500 rounded-full filter blur-3xl opacity-70"></div>
                    <div class="absolute -bottom-32 -right-32 w-64 h-64 bg-blue-500 rounded-full filter blur-3xl opacity-70"></div>
                </div>
            </header>

            <!-- Features Section -->
            <section id="features" class="py-20 bg-white bg-opacity-80 backdrop-blur-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                            Nuestros Programas</span>
                        </h2>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                            Programas diseñados para adaptarse a todos los niveles y objetivos.
                        </p>
                    </div>

                    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Card 1 -->
                        <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="h-48 bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center">
                                <svg class="h-20 w-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Pérdida de Peso</h3>
                                <p class="text-gray-600 mb-6">
                                    Programa diseñado para quemar grasa y tonificar tu cuerpo con ejercicios efectivos y nutrición balanceada.
                                </p>
                                <a href="#" class="text-blue-500 font-medium hover:text-blue-700 transition duration-150 flex items-center">
                                    Ver detalles
                                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="h-48 bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center">
                                <svg class="h-20 w-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Ganancia Muscular</h3>
                                <p class="text-gray-600 mb-6">
                                    Rutinas de fuerza y volumen para maximizar el crecimiento muscular con seguimiento de progreso.
                                </p>
                                <a href="#" class="text-blue-500 font-medium hover:text-blue-700 transition duration-150 flex items-center">
                                    Ver detalles
                                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                            <div class="h-48 bg-gradient-to-r from-yellow-400 to-red-500 flex items-center justify-center">
                                <svg class="h-20 w-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Salud Integral</h3>
                                <p class="text-gray-600 mb-6">
                                    Combina ejercicio, nutrición y mindfulness para un bienestar completo y duradero.
                                </p>
                                <a href="#" class="text-blue-500 font-medium hover:text-blue-700 transition duration-150 flex items-center">
                                    Ver detalles
                                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section class="py-20 bg-gradient-to-r from-gray-50 to-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                            Historias de Éxito</span>
                        </h2>
                        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                            Lo que nuestros miembros dicen sobre su transformación.
                        </p>
                    </div>

                    <div class="grid gap-8 md:grid-cols-3">
                        <!-- Testimonial 1 -->
                        <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
                            <div class="flex items-center mb-6">
                                <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Testimonial">
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-900">María González</h4>
                                    <p class="text-gray-500">Perdió 15kg</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">
                                "Cuidate Divirtiendote cambió mi vida. En 6 meses no solo perdí peso, sino que gané confianza y energía. Los entrenadores son increíbles!"
                            </p>
                            <div class="mt-4 flex text-yellow-400">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
                            <div class="flex items-center mb-6">
                                <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/44.jpg" alt="Testimonial">
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-900">Carlos Mendoza</h4>
                                    <p class="text-gray-500">Ganó 8kg de músculo</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">
                                "Nunca pensé que a mis 40 años podría tener este físico. Los programas de fuerza son excelentes y la comunidad es muy motivadora."
                            </p>
                            <div class="mt-4 flex text-yellow-400">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
                            <div class="flex items-center mb-6">
                                <img class="h-12 w-12 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Testimonial">
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-900">Laura Jiménez</h4>
                                    <p class="text-gray-500">Mejoró su salud</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">
                                "Gracias al programa de salud integral bajé mi presión arterial y me siento con más energía que nunca. Los entrenamientos son adaptables y la nutrición es clave."
                            </p>
                            <div class="mt-4 flex text-yellow-400">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.784.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-20 fitness-gradient">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl mb-6">
                        ¿Listo para tu transformación?
                    </h2>
                    <p class="text-xl text-white opacity-90 max