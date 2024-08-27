<?php
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

// Verificar si 'formType' está definido en $_POST
if (!isset($_POST['formType'])) {
    die("Tipo de formulario no válido.");
}

$formType = $_POST['formType'];

if ($formType == 'contact') {
    // Procesar formulario de contacto
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Consulta preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO contacto (nombre, email, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    // Verificar el resultado de la consulta
    if ($stmt->affected_rows > 0) {
        header("Location: ../gracias.html");
        exit(); // Asegurarse de que no se ejecute más código después del redireccionamiento
    } else {
        echo "Error: " . $stmt->error;
    }

} elseif ($formType == 'register') {
    // Procesar registro de usuario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $diabetesType = $_POST['diabetes_type'];
    $activityLevel = $_POST['activity_level'];
    $foodPreferences = $_POST['food_preferences'];
    $healthGoals = $_POST['health_goals'];

    // Hash de la contraseña
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Consulta preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO usuario (nombre, email, password, tipo_diabetes, nivel_actividad_fisica, preferencias_alimenticias, metas_salud) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $passwordHash, $diabetesType, $activityLevel, $foodPreferences, $healthGoals);
    $stmt->execute();

    // Verificar el resultado de la consulta
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Usuario registrado exitosamente. Inicia sesión.');</script>";
        echo "<script>window.location.href = 'iniciarsesion.php';</script>";
        exit(); // Asegurarse de que no se ejecute más código después del redireccionamiento
    } else {
        echo "Error: " . $stmt->error;
    }

} elseif ($formType == 'tracking') {
    // Procesar formulario de seguimiento
    $date = $_POST['date'];
    $mealType = $_POST['meal_type'];
    $foodConsumed = $_POST['food_consumed'];
    $quantity = $_POST['quantity'];

    // Consulta preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO seguimiento (fecha, tipo_comida, alimento_consumido, cantidad) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $date, $mealType, $foodConsumed, $quantity);
    $stmt->execute();

    // Verificar el resultado de la consulta
    if ($stmt->affected_rows > 0) {
        echo "<script>alert('La información se guardó exitosamente.');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

} else {
    die("Tipo de formulario no válido.");
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
