<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Objetivos</title>

    <!-- Fonts y Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #80c342;">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Perfil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Entrenador Personal</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Nutriólogo</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Objetivos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Alimentación personalizada</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Ejercicios personalizados</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Dieta</a></li>
                </ul>
                <span class="navbar-text text-white">Bienvenid@, crisgay</span>
                <a class="btn btn-outline-light ms-3" href="#">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <section class="py-5">
        <div class="container text-center">
            <h2>Objetivos</h2>
            <p>Metas personalizadas para mejorar la salud y el bienestar físico.</p>
            <div class="d-flex flex-column align-items-center">
                <div class="card bg-warning text-white mb-3 w-75">
                    <div class="card-body">
                        <p><strong>Nombre:</strong> Pablo Ortiz</p>
                    </div>
                </div>
                <div class="card bg-warning text-white mb-3 w-75">
                    <div class="card-body">
                        <p><strong>Edad:</strong> 28 años</p>
                    </div>
                </div>
                <div class="card bg-warning text-white mb-3 w-75">
                    <div class="card-body">
                        <p><strong>Peso:</strong> 97 kg</p>
                    </div>
                </div>
                <div class="card bg-warning text-white mb-3 w-75">
                    <div class="card-body">
                        <p><strong>Tipo de Cuerpo:</strong> Ectomorfo</p>
                    </div>
                </div>
                <div class="card bg-warning text-white mb-3 w-75">
                    <div class="card-body">
                        <p><strong>Membresía:</strong> Premium</p>
                    </div>
                </div>
                <div class="card bg-warning text-white mb-3 w-75">
                    <div class="card-body">
                        <p><strong>Fecha de Expiración:</strong> 29-07-2025</p>
                    </div>
                </div>
            </div>
            <div class="text-start w-75 mt-4">
                <p><strong>Objetivo Principal:</strong> Ganar 5 kg de masa muscular en 6 meses.</p>
                <p><strong>Dieta:</strong> Mantener un plan de alimentación alto en proteínas con 6 comidas al día.</p>
                <p><strong>Ejercicio:</strong> Rutina de levantamiento de pesas 5 días a la semana con sesiones de cardio moderado.</p>
                <p><strong>Días de la Semana:</strong> Entrenamiento de lunes a viernes.</p>
                <p><strong>Horas:</strong> Entrenamientos de 1.5 horas por sesión, con 8 horas de sueño cada noche.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-white py-3" style="background-color: #80c342;">
        <p>© 2024 Company, Inc.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
