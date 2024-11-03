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

$actualizarUsuario = "SELECT * FROM usuario WHERE id ='$id'";
$resultado = mysqli_query($conexion, $actualizarUsuario);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
<?php
if ($resultado->num_rows > 0) {
    $registro_usu = $resultado->fetch_assoc();
?>
        <h2>Modificar Usuario</h2>
        <form action="Modificar_usu.php" method="POST">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" name="id" value="<?php echo htmlspecialchars($registro_usu['id']); ?>" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($registro_usu['nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($registro_usu['email']); ?>" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="terminos" name="terminos" required>
                <label class="form-check-label" for="terminos">Aceptar términos y condiciones</label>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
<?php
} else {
    echo "<div class='alert alert-warning mt-3'>No se encontraron registros.</div>";
}
?>
<a href='mostrar_usuario.php' class='btn btn-secondary'>Volver</a>
    </div>
    
</body>
</html>
<?php
mysqli_close($conexion);
?>
