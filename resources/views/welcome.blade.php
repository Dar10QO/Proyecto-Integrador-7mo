<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>

<!-- Navegacion -->
<div class="full-background">
  <div class="menu-wrapper">
    <div class="menu-bar">
      <ul class="navigation">
        <li>
          <a href="#quienes-somos" title="Qué somos">Qué somos</a>
        </li>
        <li>
          <a href="#como-funcionamos" title="Cómo funcionamos">Cómo funcionamos</a>
        </li>
        <li>
          <a href="#planes" title="Planes">Planes</a>
        </li>
        <li>
          <a href="#contacto" title="Contacto">Contacto</a>
        </li>
      </ul>
      <div class="header-buttons text-right">
        <button class="btn btn-outline-light" onclick="abrirIniciarSesion()">Iniciar Sesión</button>
        <button id="crear-cuenta" class="btn btn-outline-light" onclick="crearcuenta()">Crear Cuenta</button>
      </div>
    </div>
  </div>

  <!-- Que somos -->
  <div class="container text-center my-4" id="quienes-somos">
    <div class="row shadowed-section align-items-center">
      <div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100 fixed-size" src="https://cdn.pixabay.com/photo/2021/03/27/10/43/yoga-6128116_1280.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 fixed-size" src="https://cdn.pixabay.com/photo/2014/11/05/15/57/salmon-518032_1280.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100 fixed-size" src="https://cdn.pixabay.com/photo/2016/02/15/23/14/fruit-1202313_1280.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <h2>Qué somos!!</h2>
        <p>Somos una plataforma dedicada a ayudarte a mantener un estilo de vida saludable mientras disfrutas de actividades divertidas y relajantes. Ofrecemos rutinas de ejercicio, recetas de comidas saludables, técnicas de relajación y actividades de aventura para un estilo de vida activo y equilibrado.</p>
      </div>
    </div>
  </div>

  <!-- Como funcionamos -->
  <div class="container text-center my-4" id="como-funcionamos">
    <div class="row">
      <a href="/login" class="flashcard-link">
      <div class="col-md-3">
        <div class="flashcard">
          <img src="https://cdn.pixabay.com/photo/2017/07/18/23/40/group-2517459_1280.png" alt="Inicia sesión o crea una cuenta" class="flashcard-image">
          <p class="flashcard-text">Inicia sesión</p>
        </div>
      </a>
      </div>
      <div class="col-md-3">
      <a href="/" class="flashcard-link">
        <div class="flashcard">
          <img src="https://cdn.pixabay.com/photo/2018/11/29/09/40/idea-3845389_1280.jpg" alt="Elige un plan" class="flashcard-image">
          <p class="flashcard-text">Elige un plan: Plan Básico Gratis o Plan Premium</p>
        </div>
      </a>
      </div>
      <div class="col-md-3">
        <a href="/formulario" class="flashcard-link">
          <div class="flashcard">
            <img src="https://cdn.pixabay.com/photo/2015/08/26/18/20/clipboard-908886_1280.png" alt="Realiza la encuesta" class="flashcard-image">
            <p class="flashcard-text">Formulario</p>
          </div>
        </a>
      </div>
      <div class="col-md-3">
        <a href="/" class="flashcard-link">
        <div class="flashcard">
          <img src="https://cdn.pixabay.com/photo/2020/05/25/02/35/groceries-5216715_1280.jpg" alt="Disfruta del plan" class="flashcard-image">
          <p class="flashcard-text">Disfruta de tu plan alimenticio y ponte en forma con el plan alimenticio</p>
        </div>
      </div>
      </a>
    </div>
  </div>

  <!-- Planes -->
  <div class="container text-center my-4" id="planes">
    <div class="pricing-container">
      <article class="pricing-card">
        <div class="pricing-card__banner">
          Plan Básico
        </div>
        <h3>Plan Básico Gratis</h3>
        <div class="pricing-card__price--original">
          Gratuito
        </div>
        <div class="pricing-card__price">
          Incluye
        </div>
        <ul>
          <li>Acceso a la creación de un plan alimenticio.</li>
          <li>Plan de ejercicios automático.</li>
        </ul>
      </article>
      <article class="pricing-card pricing-card--primary">
        <div class="pricing-card__banner">
          Más Popular
        </div>
        <h3>Plan Premium</h3>
        <div class="pricing-card__price--original">
          $149.99
        </div>
        <div class="pricing-card__price">
          Incluye
        </div>
        <ul>
          <li>Todo lo del Plan Básico.</li>
          <li>Formador personal.</li>
          <li>Nutriologo especializado.</li>
          <li>Experto en ejercicios.</li>
          <li>Planes alimenticios y de ejercicios personalizados.</li>
        </ul>
      </article>
    </div>
  </div>

  <!-- Contacto -->
  <div class="container text-center my-4" id="contacto">
    <div class="row shadowed-section">
      <div class="col-md-6 mx-auto">
        <h2 class="contact-title">Contacto</h2>
        <p class="contact-description">Si tienes alguna duda o sugerencia, no dudes en contactarnos. Estamos para ayudarte.</p>
        <p class="contact-detail">Correo:
          <a href="mailto:" class="text-primary contact-link">cuidatedivirtiendote@gmail.com</a>
        </p>
        <p class="contact-detail">Teléfono:
          <a href="tel:" class="text-primary contact-link">+52 442-747-4799</a>
        </p>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  function abrirIniciarSesion() {
    window.location.href = "/sesion";
  }
  function crearcuenta(){
    window.location.href = "/registrox";
  }
</script>
</body>
</html>
