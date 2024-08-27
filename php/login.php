<?php
session_start();

// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nutridiab_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Limitar intentos de inicio de sesión para evitar ataques de fuerza bruta
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if ($_SESSION['login_attempts'] >= 5) {
    $error_message = "Has alcanzado el número máximo de intentos. Por favor, inténtalo más tarde.";
    echo "<script>alert('$error_message');</script>";
} else {
    // Verificar si el formulario fue enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Consulta preparada para evitar inyecciones SQL
        $stmt = $conn->prepare("SELECT password FROM usuario WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Verificar si el email existe en la base de datos
        if ($stmt->num_rows == 1) {
            // Obtener el hash de la contraseña
            $stmt->bind_result($passwordHash);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($password, $passwordHash)) {
                // Contraseña correcta, restablecer intentos y redirigir a inicio_usuario.html
                $_SESSION['login_attempts'] = 0;
                $_SESSION['email'] = $email; // Opcional: almacenar el email en la sesión
                header("Location: ../usuario/inicio_usuario.html");
                exit(); // Asegura que se detiene la ejecución del script aquí
            } else {
                // Contraseña incorrecta
                $_SESSION['login_attempts'] += 1;
                $error_message = "Correo electrónico o contraseña incorrectos.";
            }
        } else {
            // Email no encontrado
            $_SESSION['login_attempts'] += 1;
            $error_message = "Correo electrónico o contraseña incorrectos.";
        }
    }
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
  <style>
    .form-control, .btn-custom {
      border-radius: 15px; /* Redondea los bordes */
    }
    .btn-custom {
      background-color: #dc3545; /* Rojo para el botón */
      color: #fff;
    }
    .btn-custom:hover {
      background-color: #c82333; /* Rojo más oscuro al pasar el ratón */
      color: #fff;
    }
  </style>
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
                    <a class="nav-link" href="../educacion.html">Cómo funciona</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../recetas.html">Explorar alimentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../planes-alimentacion.html">Dietas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactar.php">Contactar</a>
                </li>
            </ul>
            <a class="btn btn-outline-danger" href="registro.php">Registrarse</a>
            <a class="nav-link" href="iniciarsesion.php">Iniciar sesión</a>
        </div>
    </nav>
    <!-- MENÚ -->

    <!-- Inicio de Sesión -->
    <h1>ㅤ</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Inicio de Sesión</h2>
                <form id="loginForm" action="login.php" method="post" onsubmit="return validateLoginForm()">
                    <input type="hidden" name="formType" value="login">
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
