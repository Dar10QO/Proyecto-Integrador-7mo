<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rutinas') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('css/ejerciciosgratis.css') }}">
    @php
        // Datos simulados de los ejercicios
        $ejercicios = [
            ['Nombre' => 'Cardio Extremo', 'Grupo_muscular' => 'Piernas', 'Tipo_ejercicio' => 'Aeróbico'],
            ['Nombre' => 'Fuerza Total', 'Grupo_muscular' => 'Brazos', 'Tipo_ejercicio' => 'Anaeróbico'],
            ['Nombre' => 'Resistencia', 'Grupo_muscular' => 'Core', 'Tipo_ejercicio' => 'Aeróbico']
        ];
    @endphp

    <!-- Contenido Principal -->
    <div class="container text-center my-4">
        <h2>Rutinas</h2>
        <div class="dietas-container">
            @foreach ($ejercicios as $index => $ejercicio)
                <article class="dieta-card {{ $index == 1 ? 'dieta-card--primary' : '' }}">
                    <div class="dieta-card__banner">
                        {{ $index == 1 ? 'Más Popular' : $ejercicio['Nombre'] }}
                    </div>
                    <h3>{{ $ejercicio['Nombre'] }}</h3>
                    <div class="dieta-card__description">
                        {{ $ejercicio['Grupo_muscular'] }}
                    </div>
                    <div class="dieta-card__description">
                        {{ $ejercicio['Tipo_ejercicio'] }}
                    </div>
                    <form action="#" method="post">
                        <button type="button" class="btn btn-primary">Realizar</button>
                    </form>
                </article>
            @endforeach
        </div>
    </div>

    <!-- Scripts adicionales -->
    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@4"></script>
    <script>
        tippy('.link', { placement: 'bottom' });
        const toggle = document.querySelector('.js-change-theme');
        const body = document.querySelector('body');
        const profile = document.getElementById('profile');

        toggle.addEventListener('click', () => {
            if (body.classList.contains('text-gray-900')) {
                toggle.innerHTML = "☀️";
                body.classList.remove('text-gray-900');
                body.classList.add('text-gray-100');
                profile.classList.remove('bg-white');
                profile.classList.add('bg-gray-900');
            } else {
                toggle.innerHTML = "🌙";
                body.classList.remove('text-gray-100');
                body.classList.add('text-gray-900');
                profile.classList.remove('bg-gray-900');
                profile.classList.add('bg-white');
            }
        });
    </script>
</x-app-layout>
