<?php
include("conexion.php");
include("gestion_sesion.php");
include("menu.php");

verificarSesion();

// Deshabilitar caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

$id = $_POST["id"];
$eliminar = "SELECT * FROM personal WHERE id = '$id'";
$resultado = mysqli_query($conexion, $eliminar);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
<?php
if ($resultado->num_rows > 0) {
    $registro = $resultado->fetch_assoc();
?>
        <h2>Eliminar Registro</h2>
        <form action="registro_borrar.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo htmlspecialchars($registro['id']); ?>" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="rut">RUT:</label>
                <input type="text" class="form-control" id="rut" name="rut" value="<?php echo htmlspecialchars($registro['rut']); ?>" pattern="\d{1,2}\.\d{3}\.\d{3}-[0-9kK]" title="Formato: 12.345.678-9" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($registro['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo htmlspecialchars($registro['edad']); ?>" min="18" required>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo htmlspecialchars($registro['cargo']); ?>" required>
            </div>
            <div class="form-group">
                <label for="sueldo">Sueldo:</label>
                <input type="number" class="form-control" id="sueldo" name="sueldo" value="<?php echo htmlspecialchars($registro['sueldo']); ?>" min="500000" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
<?php
} else {
    echo "<div class='alert alert-warning'>No se encontraron registros.</div>";
    echo"<a href='mostrar.php' class='btn btn-secondary'>Volver</a>";
}
?>
    </div>
</body>
</html>
<?php
mysqli_close($conexion);
?>
