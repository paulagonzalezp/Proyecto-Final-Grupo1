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


// Crear tabla recetas si no existe
$sql = "CREATE TABLE IF NOT EXISTS recetas (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    comida VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL CHECK (tipo IN ('desayuno', 'almuerzo', 'cena')),
    ingredientes TEXT NOT NULL
)";

if ($conn->query($sql) === FALSE) {
    die("Error al crear la tabla: " . $conn->error);
}

// Función para cargar recetas
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'cargar') {
    cargarRecetas($conn);
}

// Función para añadir una receta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'crear') {
    crearReceta($conn);
}

// Función para editar una receta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'editar') {
    editarReceta($conn);
}

// Función para eliminar una receta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'eliminar') {
    eliminarReceta($conn);
}

function cargarRecetas($conn) {
    $sql = "SELECT * FROM recetas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $recetas = [];
        while ($row = $result->fetch_assoc()) {
            $recetas[] = $row;
        }
        echo json_encode($recetas);
    } else {
        echo json_encode([]);
    }
}

function crearReceta($conn) {
    $comida = $conn->real_escape_string($_POST['comida']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $ingredientes = $conn->real_escape_string($_POST['ingredientes']);

    $sql = "INSERT INTO recetas (comida, tipo, ingredientes) VALUES ('$comida', '$tipo', '$ingredientes')";
    if ($conn->query($sql) === TRUE) {
        echo "Receta creada con éxito";
    } else {
        echo "Error: " . $conn->error;
    }
}

function editarReceta($conn) {
    $id = (int)$_POST['id'];
    $comida = $conn->real_escape_string($_POST['comida']);
    $tipo = $conn->real_escape_string($_POST['tipo']);
    $ingredientes = $conn->real_escape_string($_POST['ingredientes']);

    $sql = "UPDATE recetas SET comida='$comida', tipo='$tipo', ingredientes='$ingredientes' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Receta editada con éxito";
    } else {
        echo "Error: " . $conn->error;
    }
}

function eliminarReceta($conn) {
    $id = (int)$_POST['id'];

    $sql = "DELETE FROM recetas WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Receta eliminada con éxito";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
