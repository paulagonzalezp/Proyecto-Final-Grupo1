<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesion - NutriDiab</title>
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

  <!-- Inicio de Sesión -->
  <div class="container my-5">
    <div class="row">
      <!-- Formulario de Inicio de Sesión -->
      <div class="col-md-6">
        <h2>Inicio de Sesión</h2>
        <form id="loginForm" action="login.php" method="post" onsubmit="return validateLoginForm()">
            <input type="hidden" name="formType" value="login"> <!-- Campo oculto añadido -->
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
            <p class="mt-3">
                ¿No tienes cuenta? 
                <a href="registro.php" class="btn btn-link">Regístrate aquí</a>
            </p>
        </form>
        <div id="error-message" class="text-danger mt-3">
            <?php if (isset($error_message)): ?>
                <?php echo $error_message; ?>
            <?php endif; ?>
        </div>
      </div>
      <!-- Imagen y texto -->
      <div class="col-md-6 d-flex flex-column align-items-center justify-content-center text-center">
        <img src="../imagenes/imagen-dieta.jpg" class="img-fluid mb-3" alt="Imagen de dieta saludable">
        <h3>¡Bienvenido a NutriDiab!</h3>
        <p>La plataforma que te ayuda a llevar una vida saludable y controlada. Únete a nosotros para acceder a planes de alimentación personalizados, recetas deliciosas y mucho más.</p>
      </div>
    </div>
  </div>
  <!-- Fin de Inicio de Sesión -->
  <script>
  function validateLoginForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email === '' || password === '') {
      alert('Por favor, complete todos los campos.');
      return false;
    }

    return true;
  }
</script>

</body>

</html>
