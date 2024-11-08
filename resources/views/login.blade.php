<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio de sesión</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="login-container">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://cdn.pixabay.com/photo/2016/02/15/23/14/fruit-1202313_1280.jpg" class="d-block w-100" alt="Imagen 1">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
          <img src="https://cdn.pixabay.com/photo/2014/11/05/15/57/salmon-518032_1280.jpg" class="d-block w-100" alt="Imagen 2">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
        <div class="carousel-item">
          <img src="https://cdn.pixabay.com/photo/2014/11/05/15/57/salmon-518032_1280.jpg" class="d-block w-100" alt="Imagen 3">
          <div class="carousel-caption d-none d-md-block"></div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
    <div class="row form-content">
      <div class="col-md-8 form-wrapper">
        <div class="welcome-message">
          <h1>¡Bienvenido de nuevo! &#x1F44F;</h1>
          <p>¡Por favor, ingresa tus datos!</p>
        </div>
        <form class="login-form" action="/login" method="POST">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>


            </strong>
          </div>
          <div class="divider">
            <div class="divider-line"></div>
            <div class="divider-line"></div>
          </div>
          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <div class="input-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Tu correo electrónico" required>
              <div class="input-group-append">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <div class="input-group">
              <input id="password" type="password" name="password" class="form-control" placeholder="Tu contraseña" title="Mínimo 6 caracteres, al menos 1 letra y 1 número" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" required>
              <div class="input-group-append">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
          <div class="form-actions">
            <div class="signup-link">
              <a href="/registrox" title="Crear Cuenta">Crear Cuenta</a>
            </div>
            <div class="signup-link">
              <a href="/" title="Regreso">Regresar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>