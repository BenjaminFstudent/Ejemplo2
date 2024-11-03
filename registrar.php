<?php
include("conexion.php");
include("gestion_sesion.php");
include("menu.php");

verificarSesion();

// Deshabilitar caché del navegador
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

if (isset($_POST["submit"])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $clave = $_POST['password'];
    $terminos = isset($_POST['terminos']) ? 1 : 0;

    // Verificar si el correo ya está registrado
    $verificar_email = "SELECT * FROM usuario WHERE email='$email'";
    $resultado = $conexion->query($verificar_email);

    echo "<div class='container my-4'>"; // Contenedor

    if ($resultado->num_rows > 0) {
        echo "<div class='alert alert-danger' role='alert'>Este correo ya está registrado. Inténtelo nuevamente.</div>";
        echo "<a href='nuevo_usuario.php' class='btn btn-secondary'>Volver</a>";
    } else {
        // Validar la contraseña
        if (strlen($clave) < 8 || !preg_match('/[0-9]/', $clave) || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $clave) || !preg_match('/[A-Z]/', $clave)) {
            echo "<div class='alert alert-warning' role='alert'>La contraseña debe tener al menos 8 caracteres, incluir al menos un número, un símbolo y una letra mayúscula.</div>";
            echo "<a href='nuevo_usuario.php' class='btn btn-secondary'>Volver</a>";
            exit;
        }

        // Hashear la contraseña
        $clave_hashed = password_hash($clave, PASSWORD_DEFAULT);

        // Insertar el usuario en la base de datos
        $agregar = "INSERT INTO usuario(nombre, email, clave, terminos) VALUES ('$nombre', '$email', '$clave_hashed', '$terminos')";

        if ($conexion->query($agregar) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>Registro agregado exitosamente.</div>";
            echo "<a href='mostrar_usuario.php' class='btn btn-primary'>Ver Registros</a>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al agregar registro. Por favor, inténtelo de nuevo.</div>";
            echo "<a href='nuevo_usuario.php' class='btn btn-secondary'>Volver</a>";
        }
    }

    echo "</div>"; // Cerrar el contenedor
    $conexion->close();
}
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
