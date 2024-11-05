<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ejercicios Personalizados') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/ejp.css') }}">

    <section id="exercise-plans" class="section bg-light">
        <div class="container">
            <h2>Ejercicios Personalizados</h2>
            <div class="exercise-list">
                @foreach ([
                    ['img' => 'sentadillas.webp', 'title' => 'Sentadillas', 'description' => 'Repeticiones: 3 series de 12 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Flexionespecho.webp', 'title' => 'Flexiones de pecho', 'description' => 'Repeticiones: 3 series de 15 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Pesomuerto.webp', 'title' => 'Peso muerto', 'description' => 'Repeticiones: 3 series de 10 repeticiones<br>Duración: 1.5 minutos por serie'],
                    ['img' => 'Pesobanca.webp', 'title' => 'Press de banca', 'description' => 'Repeticiones: 3 series de 12 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'dominadas.webp', 'title' => 'Dominadas', 'description' => 'Repeticiones: 3 series de 8 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Zancadas.webp', 'title' => 'Zancadas', 'description' => 'Repeticiones: 3 series de 12 repeticiones por pierna<br>Duración: 1.5 minutos por serie'],
                    ['img' => 'Remomancuernas.webp', 'title' => 'Remo con mancuernas', 'description' => 'Repeticiones: 3 series de 10 repeticiones<br>Duración: 1.5 minutos por serie'],
                    ['img' => 'Plancha.webp', 'title' => 'Plancha', 'description' => 'Repeticiones: 3 series<br>Duración: 1 minuto por serie'],
                    ['img' => 'Pressmilitar.webp', 'title' => 'Press militar', 'description' => 'Repeticiones: 3 series de 10 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Elevacioneslaterales.webp', 'title' => 'Elevaciones laterales', 'description' => 'Repeticiones: 3 series de 15 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Curlbiceps.webp', 'title' => 'Curl de bíceps', 'description' => 'Repeticiones: 3 series de 12 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Extensionestriceps.webp', 'title' => 'Extensiones de tríceps', 'description' => 'Repeticiones: 3 series de 12 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Abdominalesbicicleta.webp', 'title' => 'Abdominales en bicicleta', 'description' => 'Repeticiones: 3 series de 20 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Elevacionestalones.webp', 'title' => 'Elevaciones de talones', 'description' => 'Repeticiones: 3 series de 15 repeticiones<br>Duración: 1 minuto por serie'],
                    ['img' => 'Cardio.webp', 'title' => 'Cardio', 'description' => 'Repeticiones: 1 sesión<br>Duración: 30 minutos'],
                    ['img' => 'Burpees.webp', 'title' => 'Burpees', 'description' => 'Repeticiones: 3 series de 10 repeticiones<br>Duración: 1 minuto por serie']
                ] as $index => $exercise)
                <div class="flashcard" onclick="toggleDescription('desc{{ $index + 1 }}')">
                    <img src="{{ asset('IMG/' . $exercise['img']) }}" alt="{{ $exercise['title'] }}" class="flashcard-image">
                    <div class="flashcard-text">{{ $exercise['title'] }}</div>
                    <div id="desc{{ $index + 1 }}" class="exercise-description">
                        <h5>{{ $exercise['title'] }}</h5>
                        {!! $exercise['description'] !!}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Rutina Semanal -->
            <div class="weekly-routine">
                <h3>Plan de ejercicios Semanal</h3>
                <table class="routine-table">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Ejercicio</th>
                            <th>Repeticiones</th>
                            <th>Duración</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([
                            ['day' => 'Lunes', 'exercises' => 'Sentadillas, Flexiones de pecho, Plancha', 'reps' => '3x12, 3x15, 3 series', 'duration' => '1 min/serie, 1 min/serie, 1 min/serie'],
                            ['day' => 'Martes', 'exercises' => 'Peso muerto, Press de banca, Curl de bíceps', 'reps' => '3x10, 3x12, 3x12', 'duration' => '1.5 min/serie, 1 min/serie, 1 min/serie'],
                            ['day' => 'Miércoles', 'exercises' => 'Dominadas, Zancadas, Extensiones de tríceps', 'reps' => '3x8, 3x12 por pierna, 3x12', 'duration' => '1 min/serie, 1.5 min/serie, 1 min/serie'],
                            ['day' => 'Jueves', 'exercises' => 'Remo con mancuernas, Elevaciones laterales, Abdominales en bicicleta', 'reps' => '3x10, 3x15, 3x20', 'duration' => '1.5 min/serie, 1 min/serie, 1 min/serie'],
                            ['day' => 'Viernes', 'exercises' => 'Press militar, Elevaciones de talones, Burpees', 'reps' => '3x10, 3x15, 3x10', 'duration' => '1 min/serie, 1 min/serie, 1 min/serie'],
                            ['day' => 'Sábado', 'exercises' => 'Cardio', 'reps' => '1 sesión', 'duration' => '30 min'],
                            ['day' => 'Domingo', 'exercises' => 'Descanso', 'reps' => '-', 'duration' => '-']
                        ] as $day)
                        <tr>
                            <td>{{ $day['day'] }}</td>
                            <td>{{ $day['exercises'] }}</td>
                            <td>{{ $day['reps'] }}</td>
                            <td>{{ $day['duration'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        console.log("Archivo JavaScript cargado.");

        function toggleDescription(id) {
            console.log("toggleDescription llamado con id:", id);
            var description = document.getElementById(id);
            if (description) {
                description.classList.toggle('show');
            } else {
                console.error("No se encontró el elemento con id:", id);
            }
        }
    </script>
</x-app-layout>
