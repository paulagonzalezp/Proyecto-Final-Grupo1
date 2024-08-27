<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactar - NutriDiab</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="stylesheet" href="../css/contactar.css">
    <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio_usuario.html">
                <a class="navbar-brand d-flex align-items-center" href="../usuario/inicio_usuario.html">
                    <img src="../imagenes/imagen.jpg" width="45" height="45" class="d-inline-block align-top" alt="Logo NutriDiab">
                    <span class="ml-2 custom-font" style="font-size: 1.5rem; vertical-align: middle;">NutriDiab</span>
                </a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="..usuario/inicio_usuario.html">
                                <i class="bi bi-house-door"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../usuario.planes.html">
                                <i class="bi bi-calendar-check"></i> Planificador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="seguimiento-diario.php">
                                <i class="bi bi-journal-text"></i> Seguimiento Diario
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactar_usuario.php">
                                <i class="bi bi-person-lines-fill"></i> Contactar Profesionales
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../usuario/planificador.html">
                                <i class="bi bi-menu-button-wide"></i> Planes de Alimentación
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../index.html">
                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

  <!-- Formulario de Contacto -->
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
       <center><h2>Contactar con NutriDiab</h2></center>
        <p class="lead mb-4">
          <center><p class="texto-pequeno"></p><i>Estamos aquí para ayudarte. Por favor, envíanos tus preguntas o
            comentarios y nos pondremos en contacto contigo lo antes posible.</i></p></center>
        </p>
        <form id="contactForm" action="process.php" method="post" onsubmit="return validateContactForm()">
          <input type="hidden" name="formType" value="contact">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa tu nombre" required>
          </div>
          <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
          </div>
          <div class="form-group">
            <label for="message">Mensaje</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Escribe tu mensaje" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
        </form>
      </div>
      <!-- Imagen y texto -->
      <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-over-image">
        <img src="../imagenes/aaa.jpg" style="width: 80%; height: auto;" alt="Imagen de dieta saludable">
      </div>
      <!-- Imagen y texto -->
    </div>
  </div>
  <!-- Formulario de Contacto -->
</body>
</html>
