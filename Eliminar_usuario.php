<?php
include("conexion.php");
include("menu.php");
include("gestion_sesion.php");
verificarSesion();

// Deshabilitar caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

echo "<h2 class='text-center my-4'>Bienvenido, Usuario!</h2>";

echo "<div class='container'>";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $eliminarusu = "DELETE FROM usuario WHERE id = $id";

    if ($conexion->query($eliminarusu) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Registro eliminado correctamente.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al eliminar registro: " . $conexion->error . "</div>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No se ha proporcionado el ID del usuario.</div>";
}

$conexion->close();
?>

<br>
<a href="mostrar_usuario.php" class="btn btn-primary">Ver Registros</a>
</div>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

