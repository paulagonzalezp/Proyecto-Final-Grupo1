<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento Diario - NutriDiab</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="../css/seguimiento-diario.css">
    <link rel="stylesheet" href="../css/usuario.css">
    <style>
        /* CSS para mejorar el formulario */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
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

        .btn-success {
            background-color: #38a169;
            border-color: #38a169;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 700;
            width: 100%;
        }

        .btn-success:hover {
            background-color: #2f855a;
            border-color: #2f855a;
        }
    </style>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio_usuario.html">
                <a class="navbar-brand d-flex align-items-center" href="inicio_usuario.html">
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
                            <a class="nav-link active" aria-current="page" href="inicio_usuario.html">
                                <i class="bi bi-house-door"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../usuario/planes.html">
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

    <!-- Contenido Principal -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">ㅤㅤㅤㅤㅤㅤSeguimiento Diarioㅤㅤㅤㅤㅤㅤ</h2>
                        <form id="trackingForm">
                            <div class="mb-3">
                                <label for="date" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="mb-3">
                                <label for="meal_type" class="form-label">Tipo de Comida:</label>
                                <select class="form-select" id="meal_type" name="meal_type" required>
                                    <option value="Desayuno">Desayuno</option>
                                    <option value="Almuerzo">Almuerzo</option>
                                    <option value="Cena">Cena</option>
                                    <option value="Snack">Snack</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="food_consumed" class="form-label">Alimento Consumido:</label>
                                <input type="text" class="form-control" id="food_consumed" name="food_consumed" required>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Cantidad:</label>
                                <input type="text" class="form-control" id="quantity" name="quantity" required>
                            </div>

                            <button type="submit" class="btn btn-success">Añadir Registro</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Resumen del Seguimiento Diario</h2>
                        <div id="resumen-container">
                            <!-- Aquí se mostrarán los registros diarios -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('trackingForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario

            // Capturar los valores del formulario
            const date = document.getElementById('date').value;
            const mealType = document.getElementById('meal_type').value;
            const foodConsumed = document.getElementById('food_consumed').value;
            const quantity = document.getElementById('quantity').value;

            // Crear un nuevo elemento de registro
            const newRecord = document.createElement('div');
            newRecord.classList.add('mb-3');
            newRecord.innerHTML = `
                <strong>Fecha:</strong> ${date} <br>
                <strong>Tipo de Comida:</strong> ${mealType} <br>
                <strong>Alimento Consumido:</strong> ${foodConsumed} <br>
                <strong>Cantidad:</strong> ${quantity}
                <hr>
            `;

            // Agregar el nuevo registro al contenedor
            document.getElementById('resumen-container').appendChild(newRecord);

            // Limpiar el formulario
            this.reset();
        });
    </script>
</body>
</html>
