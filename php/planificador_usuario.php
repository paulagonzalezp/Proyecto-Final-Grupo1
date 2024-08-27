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

// Consultar datos guardados si existe el parámetro de éxito
$success = isset($_GET['success']) && $_GET['success'] == '1';
if ($success) {
    $sql = "SELECT id, tipo_diabetes, tiempo_comida, alergias, comida, otra_alergia FROM planusuario ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);
    $latestEntry = $result->fetch_assoc();
}

// Manejo de solicitudes CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $tipo_diabetes = $_POST['diabetes_type'];
        $tiempo_comida = $_POST['meal_time'];
        $alergias = implode(', ', $_POST['allergies']);
        $comida = $_POST['food'];
        $otra_alergia = $_POST['other_allergies'];

        $sql = "INSERT INTO planusuario (tipo_diabetes, tiempo_comida, alergias, comida, otra_alergia) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $tipo_diabetes, $tiempo_comida, $alergias, $comida, $otra_alergia);
        $stmt->execute();
        $stmt->close();

        header('Location: planificador_usuario.php?success=1');
        exit();
    } elseif ($action === 'edit') {
        $id = $_POST['id'];
        $tipo_diabetes = $_POST['diabetes_type'];
        $tiempo_comida = $_POST['meal_time'];
        $alergias = implode(', ', $_POST['allergies']);
        $comida = $_POST['food'];
        $otra_alergia = $_POST['other_allergies'];

        $sql = "UPDATE planusuario SET tipo_diabetes=?, tiempo_comida=?, alergias=?, comida=?, otra_alergia=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $tipo_diabetes, $tiempo_comida, $alergias, $comida, $otra_alergia, $id);
        $stmt->execute();
        $stmt->close();

        header('Location: planificador_usuario.php?success=1');
        exit();
    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        $sql = "DELETE FROM planusuario WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        header('Location: planificador_usuario.php?success=1');
        exit();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planificador de Comidas</title>
    <script src="../js/crud.js" defer></script>
</head>
<body>
    <form id="mealForm" method="post">
        <input type="hidden" name="action" value="add">

        <label for="diabetes_type">1. Selecciona tu tipo de diabetes:</label>
        <select name="diabetes_type" id="diabetes_type" required>
            <option value="Diabetes tipo 1">Diabetes tipo 1</option>
            <option value="Diabetes tipo 2">Diabetes tipo 2</option>
            <option value="Prediabetes">Prediabetes</option>
            <option value="Gestacional">Gestacional</option>
        </select>
        <br><br>

        <label for="meal_time">2. Selecciona tu tiempo de comida:</label>
        <select name="meal_time" id="meal_time" required>
            <option value="Desayuno">Desayuno</option>
            <option value="Almuerzo">Almuerzo</option>
            <option value="Cena">Cena</option>
            <option value="Merienda">Merienda</option>
            <option value="Snack de medianoche">Snack de medianoche</option>
        </select>
        <br><br>

        <label for="allergies">3. Selecciona tus alergias (puedes seleccionar más de una):</label><br>
        <input type="checkbox" name="allergies[]" value="Sin alergias conocidas"> Sin alergias conocidas<br>
        <input type="checkbox" name="allergies[]" value="Gluten"> Gluten<br>
        <input type="checkbox" name="allergies[]" value="Lácteos"> Lácteos<br>
        <input type="checkbox" name="allergies[]" value="Frutos secos"> Frutos secos<br>
        <input type="checkbox" name="allergies[]" value="Mariscos"> Mariscos<br>
        <input type="checkbox" name="allergies[]" value="Soja"> Soja<br>
        <input type="checkbox" name="allergies[]" value="Huevo"> Huevo<br>
        <input type="checkbox" name="allergies[]" value="Maní"> Maní<br>
        <input type="checkbox" name="allergies[]" value="Otros"> Otros<br>
        <label for="other_allergies">Otros (especificar):</label>
        <input type="text" name="other_allergies" id="other_allergies">
        <br><br>

        <label for="food">4. Selecciona tu comida:</label><br>
        <select name="food" id="food" required>
            <optgroup label="Desayuno">
                <option value="Avena con frutas y nueces">Avena con frutas y nueces</option>
                <option value="Yogur griego con bayas">Yogur griego con bayas</option>
                <option value="Tostadas integrales con aguacate">Tostadas integrales con aguacate</option>
                <option value="Omelette de claras de huevo con espinacas y champiñones">Omelette de claras de huevo con espinacas y champiñones</option>
            </optgroup>
            <optgroup label="Almuerzo">
                <option value="Ensalada de pollo con aderezo de yogur y nueces">Ensalada de pollo con aderezo de yogur y nueces</option>
                <option value="Salmón a la parrilla con quinoa y vegetales al vapor">Salmón a la parrilla con quinoa y vegetales al vapor</option>
                <option value="Wrap de pavo con vegetales y hummus">Wrap de pavo con vegetales y hummus</option>
                <option value="Sopa de lentejas con una ensalada pequeña">Sopa de lentejas con una ensalada pequeña</option>
            </optgroup>
            <optgroup label="Cena">
                <option value="Pechuga de pollo a la parrilla con brócoli y batata al horno">Pechuga de pollo a la parrilla con brócoli y batata al horno</option>
                <option value="Tacos de pescado con tortilla de maíz y ensalada de repollo">Tacos de pescado con tortilla de maíz y ensalada de repollo</option>
                <option value="Pasta de trigo integral con salsa de tomate y albóndigas de pavo">Pasta de trigo integral con salsa de tomate y albóndigas de pavo</option>
                <option value="Estofado de carne magra con zanahorias y papas">Estofado de carne magra con zanahorias y papas</option>
            </optgroup>
            <optgroup label="Merienda/Snack">
                <option value="Palitos de zanahoria y apio con hummus">Palitos de zanahoria y apio con hummus</option>
                <option value="Nueces y semillas mixtas (sin sal)">Nueces y semillas mixtas (sin sal)</option>
                <option value="Fruta fresca (manzana, pera, bayas)">Fruta fresca (manzana, pera, bayas)</option>
                <option value="Galletas integrales con queso bajo en grasa">Galletas integrales con queso bajo en grasa</option>
            </optgroup>
        </select>
        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <ul id="mealList">
        <!-- Aquí se cargarán las comidas usando JavaScript -->
    </ul>

    <!-- Mostrar entrada más reciente si es exitosa -->
    <?php if ($success): ?>
    <h2>Datos Guardados</h2>
    <p><strong>Tipo de Diabetes:</strong> <?php echo htmlspecialchars($latestEntry['tipo_diabetes']); ?></p>
    <p><strong>Tiempo de Comida:</strong> <?php echo htmlspecialchars($latestEntry['tiempo_comida']); ?></p>
    <p><strong>Alergias:</strong> <?php echo htmlspecialchars($latestEntry['alergias']); ?></p>
    <p><strong>Comida:</strong> <?php echo htmlspecialchars($latestEntry['comida']); ?></p>
    <p><strong>Otra Alergia:</strong> <?php echo htmlspecialchars($latestEntry['otra_alergia']); ?></p>
    <?php endif; ?>
</body>
</html>
