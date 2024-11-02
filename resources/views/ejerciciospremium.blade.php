<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entrenador Personal') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/ep.css') }}">

    <body>
        <section id="about" class="section">
            <div class="container">
                <div class="row shadowed-section">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('IMG/Entrenador.webp') }}" alt="Perfil" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-8">
                        <h2>Eduardo</h2>
                        <p>Soy entrenador personal certificado con más de 10 años de experiencia en ayudar a personas a alcanzar sus objetivos de fitness. Mi enfoque está en crear planes de entrenamiento personalizados que se adapten a tus necesidades y metas.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="section bg-light">
            <div class="container">
                <h2>Servicios</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('IMG/Ep.jpg') }}" alt="Entrenamientos Personalizados">
                            <div class="card-body">
                                <h5 class="card-title">Entrenamientos Personalizados</h5>
                                <p class="card-text">Planes de entrenamiento diseñados para ti, teniendo en cuenta tus objetivos y tu físico actual.</p>
                                <a href="{{ url('Ejp.html') }}" class="btn btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('IMG/Extensionestriceps.webp') }}" alt="Entrenamientos en Grupo">
                            <div class="card-body">
                                <h5 class="card-title">Objetivos</h5>
                                <p class="card-text">Sesiones grupales para mantenerte motivado y en movimiento junto a otros.</p>
                                <a href="{{ url('objetivo.html') }}" class="btn btn-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials" class="section">
            <div class="container">
                <h2>Testimonios</h2>
                <p>"Gracias a su programa personalizado, logré perder 10 kilos y ahora me siento más saludable que nunca!" - María P.</p>
                <p>"Las sesiones grupales son motivadoras y muy efectivas." - Juan D.</p>
            </div>
        </section>

        <section id="contact" class="section bg-light">
            <div class="container">
                <h2>Contacto</h2>
                <p>Para más información o para agendar una consulta, por favor, contáctame a través del siguiente formulario:</p>
                <form>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" placeholder="Tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" placeholder="Tu correo electrónico">
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Tu mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </section>
    </body>
</x-app-layout>
