<?php
include("gestion_sesion.php");

cerrarSesion();

// Destruye la cookie de aceptación de cookies
setcookie('accept_cookies', '', time() - 3600, "/");

// Redirige al usuario a la página de login
header("Location: index.php");
exit();
?>
