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

// Procesar formulario de plan de usuario
$formType = $_POST['formType'];
if ($formType == 'planusuario') {
    $diabetesType = $_POST['diabetes_type'];
    $mealTime = $_POST['meal_time'];
    $allergies = isset($_POST['allergies']) ? implode(", ", $_POST['allergies']) : 'Sin alergias conocidas';
    $food = $_POST['food'];
    $otherAllergies = $_POST['other_allergies'];

    // Consulta preparada para evitar inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO planusuario (tipo_diabetes, tiempo_comida, alergias, comida, otra_alergia) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $diabetesType, $mealTime, $allergies, $food, $otherAllergies);

    if ($stmt->execute()) {
        // Redirigir a la misma página con un parámetro de éxito
        header("Location: planificador_usuario.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    die("Tipo de formulario no válido.");
}

$conn->close();
?>
