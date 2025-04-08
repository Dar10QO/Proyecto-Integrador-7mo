<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tu App de Gym') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <!-- Logo personalizado - Versión más grande -->
            <div class="mb-10 w-full flex justify-center">
                <a href="{{ url('/') }}" class="group">
                    <img src="{{ asset('img/logo.jpeg') }}" 
                         alt="Fitness Hub" 
                         class="h-24 w-auto transition-all duration-300 group-hover:scale-105">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-6 py-6 bg-white shadow-lg overflow-hidden sm:rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>