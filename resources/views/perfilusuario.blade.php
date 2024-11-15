<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/vistap.css') }}">

    <!-- Perfil -->
    <div class="container my-4" id="perfil">
        <img src="{{ asset('IMG/pablo.webp') }}" alt="Perfil" class="profile-image">
        <div class="profile-section">
            <h2 class="profile-title">{{ Auth::user()->Nombre }}</h2>
            <div class="profile-content">
                <p><strong>Edad:</strong> 28</p>
                <p><strong>Peso:</strong> 97 kg</p>
                <p><strong>Tipo de cuerpo:</strong> Ectomorfo</p>
                <p><strong>Membrsia:</strong> Gratuita</p>
                <p><strong>Fecha Expiración:</strong> 29-07-2025</p>
            </div>
        </div>
    </div>
</x-app-layout>
