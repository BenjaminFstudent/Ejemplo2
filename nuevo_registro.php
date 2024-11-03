<?php
include("gestion_sesion.php");
include("menu.php");
verificarSesion();

// Deshabilitar caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

//echo "Bienvenido, Usuario!"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar Nuevo Registro</h2>
        <!-- Formulario para ingresar un nuevo registro de empleado -->
        <form action="Registrar.php" method="POST">
            <div class="form-group">
                <label for="rut">Rut:</label>
                <input type="text" id="rut" name="rut" class="form-control" pattern="\d{1,2}\.\d{3}\.\d{3}-[0-9kK]" title="Formato: 12.345.678-9" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" class="form-control" min="18" required>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sueldo">Sueldo:</label>
                <input type="number" id="sueldo" name="sueldo" class="form-control" min="500000" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
            <button type="reset" name="reset" class="btn btn-secondary">Cancelar</button>
        </form>
    </div>
</body>
</html>
