<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactar - NutriDiab</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link rel="stylesheet" href="../css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- MENÚ -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand d-flex align-items-center" href="../index.html">
      <img src="../imagenes/imagen.jpg" width="60" height="60" class="d-inline-block align-top" alt="Logo NutriDiab">
      <span class="ml-2 custom-font">NutriDiab</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../educacion.html"><i class="bi bi-info-circle"></i> Cómo funciona</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../recetas.html"><i class="bi bi-search"></i> Explorar alimentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../planes-alimentacion.html"><i class="bi bi-journal"></i> Dietas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactar.php"><i class="bi bi-envelope"></i> Contactar</a>
        </li>
      </ul>
      <div class="navbar-btns ml-auto">
        <a class="btn btn-outline-danger" href="registro.php"><i class="bi bi-person-plus"></i> Registrarse</a>
        <a class="btn btn-outline-primary ml-2" href="iniciarsesion.php"><i class="bi bi-box-arrow-in-right"></i> Iniciar sesión</a>
      </div>
    </div>
  </nav>
  <!-- MENÚ -->



  <!-- TÍTULO PRINCIPAL -->
  <div class="container mt-5">
    <header class="header-bg text-center">
      <h1 class="mb-4">Contactar con NutriDiab</h1>
    </header>
  </div>
  <!-- TÍTULO PRINCIPAL -->

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
