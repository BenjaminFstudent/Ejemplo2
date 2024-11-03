<?php
include("conexion.php");
include("menu.php");
include("gestion_sesion.php");
verificarSesion();

// Deshabilitar caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

echo "<div class='container my-4'>"; // Contenedor

echo "<h2>Bienvenido, Usuario!</h2>";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $terminos = isset($_POST['terminos']) ? 1 : 0;

    // Verificar si el nuevo correo ya está registrado por otro usuario
    $verificar_email = "SELECT * FROM usuario WHERE email='$email' AND id != '$id'";
    $resultado = $conexion->query($verificar_email);

    if ($resultado->num_rows > 0) {
        // El correo ya está registrado por otro usuario
        echo "<div class='alert alert-danger' role='alert'>Este correo ya está registrado por otro usuario. Por favor, use otro.</div>";
    } else {
        $actualizar_usu = "UPDATE usuario SET
        nombre ='$nombre',
        email = '$email',
        terminos = '$terminos'
        WHERE id = '$id'";

        if ($conexion->query($actualizar_usu) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Registro modificado correctamente.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al modificar el registro: " . $conexion->error . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No se ha proporcionado el ID del usuario.</div>";
}

$conexion->close();
echo "</div>"; // Cerrar el contenedor
?>
<br>
<div class="text-center">
    <button class="btn btn-primary"><a href="mostrar_usuario.php" class="text-white">Ver Registros</a></button>
</div>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

