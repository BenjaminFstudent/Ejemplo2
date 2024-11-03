<?php
include("conexion.php");
include("menu.php");
include("gestion_sesion.php");

verificarSesion();

// Deshabilitar caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

$id = $_POST["id"];
$confirmacion_Usuario = "SELECT * FROM usuario WHERE id ='$id'";
$resultado = mysqli_query($conexion, $confirmacion_Usuario);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
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
        <h2>Eliminar Usuario</h2>
        <form action="Eliminar_usuario.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo htmlspecialchars($registro['id']); ?>" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($registro['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($registro['email']); ?>" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="terminos" name="terminos" required>
                <label class="form-check-label" for="terminos">Aceptar términos y condiciones</label>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
<?php
} else {
    echo "<div class='alert alert-warning mt-3'>No se encontraron registros.</div>";
    echo "<a href='mostrar_usuario.php' class='btn btn-secondary'>Volver</a>";
}
?>
    </div>
</body>
</html>
<?php
mysqli_close($conexion);
?>

