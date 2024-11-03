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
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $cargo = $_POST['cargo'];
    $sueldo = $_POST['sueldo'];

    $verificar_rut = "SELECT * FROM personal WHERE rut='$rut' AND id != '$id'";
    $resultado = $conexion->query($verificar_rut);

    if ($resultado->num_rows > 0) {
        // El rut ya está registrado por otro usuario
        echo "<div class='alert alert-danger' role='alert'>Este RUT ya está registrado. Inténtelo nuevamente.</div>";
        echo "<a href='mostrar_usuario.php' class='btn btn-warning mt-3'>Volver</a>";
    } else {
        $actualizar = "UPDATE personal SET
            rut = '$rut',
            nombre = '$nombre',
            edad = '$edad',
            cargo = '$cargo',
            sueldo = '$sueldo'
            WHERE id = '$id'";

        if ($conexion->query($actualizar) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Registro modificado correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al modificar el registro: " . $conexion->error . "</div>";
            echo "<a href='actualizar.php' class='btn btn-warning mt-3'>Volver</a>";
        }
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No se ha proporcionado el ID del usuario.</div>";
}

$conexion->close();
?>
<br>
<a href="mostrar.php" class="btn btn-primary">Mostrar Registros</a>
</div>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
