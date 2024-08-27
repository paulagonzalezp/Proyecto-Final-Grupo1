<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - NutriDiab</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  
  <style>
    /* CSS para mejorar el formulario de registro */
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f4;
    }

    .background-image {
      background-image: url('../imagenes/diabetes.webp');
      background-size: cover;
      background-position: center;
      padding: 50px 0;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: none;
      background-color: rgba(255, 255, 255, 0.9); /* Fondo semitransparente */
    }

    .card-title {
      font-weight: 700;
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-control,
    .form-select {
      border-radius: 10px;
      border: 1px solid #ced4da;
      padding: 10px;
    }

    .form-control:focus,
    .form-select:focus {
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
      border-color: #80bdff;
    }

    textarea.form-control {
      resize: none;
    }

    .btn-primary {
      background-color: #38a169;
      border-color: #38a169;
      border-radius: 10px;
      padding: 10px 20px;
      font-weight: 700;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #2f855a;
      border-color: #2f855a;
    }

    .navbar-nav .nav-link {
      font-weight: 700;
    }

    @media (min-width: 576px) {
      .card-body {
        padding: 40px;
      }

      .btn-primary {
        width: auto;
      }
    }
  </style>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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

  <!-- Registro de usuario con imagen de fondo -->
  <header class="background-image">
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">¡Regístrate!</h2>
              <form id="registerForm" action="process.php" method="post" onsubmit="return validateRegisterForm()" class="row g-3 w-100 mx-auto">
                <input type="hidden" name="formType" value="register">

                <div class="col-md-6 mb-3">
                  <label for="name" class="form-label">Nombre:</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="email" class="form-label">Correo Electrónico:</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="password" class="form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="confirm_password" class="form-label">Confirmar Contraseña:</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="diabetes_type" class="form-label">Tipo de Diabetes:</label>
                  <select class="form-select" id="diabetes_type" name="diabetes_type" required>
                    <option value="Tipo 1">Tipo 1</option>
                    <option value="Tipo 2">Tipo 2</option>
                    <option value="Gestacional">Gestacional</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="activity_level" class="form-label">Nivel de Actividad Física:</label>
                  <select class="form-select" id="activity_level" name="activity_level" required>
                    <option value="Bajo">Bajo</option>
                    <option value="Medio">Medio</option>
                    <option value="Alto">Alto</option>
                  </select>
                </div>

                <div class="col-12 mb-3">
                  <label for="food_preferences" class="form-label">Preferencias Alimenticias:</label>
                  <textarea class="form-control" id="food_preferences" name="food_preferences" rows="3" required></textarea>
                </div>

                <div class="col-12 mb-3">
                  <label for="health_goals" class="form-label">Metas de Salud:</label>
                  <textarea class="form-control" id="health_goals" name="health_goals" rows="3" required></textarea>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</body>
</html>
