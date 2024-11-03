
<!DOCTYPE html>
<div class="container col-8 bg-light">
<html lang="es">
<head>
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
    <div class="container rounded text-center d-flex justify-content-center align-items-center w-75 mt-5">
        <?php
        include("conexion.php");
        include("gestion_sesion.php");

        if (isset($_POST['email']) && isset($_POST['clave'])) {
            if (isset($_COOKIE['accept_cookies']) && $_COOKIE['accept_cookies'] == 'yes') {
                $email = $_POST['email'];
                $clave = $_POST['clave'];

                $validar = "SELECT * FROM usuario WHERE email = ?";
                $stmt = $conexion->prepare($validar);

                if ($stmt) {
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $resultado = $stmt->get_result();

                    if ($resultado->num_rows > 0) {
                        $fila = $resultado->fetch_assoc();
                        if (password_verify($clave, $fila['clave'])) 
                        {
                            iniciarSesion($fila['id']);     
                            header("Location: mostrar.php");
                            exit();
                        } else {
                            echo "<div class='h1 border border-danger h3'><u>Contraseña incorrecta</u></div>";
                        }
                    } else {
                        echo "<div class='h1 border border-danger'><u>No se encontró un usuario con ese correo</u></div>";
                    }

                    $stmt->close();
                } else {
                    echo "<div class='h1 border border-danger'><u>Error en la preparación de la consulta: </u>" . $conexion->error . "</div>";
                }
            } else {
                echo "<div class='h1 border border-danger'><u>Debes aceptar las cookies para iniciar sesión.</u></div>";
            }
        }

        $conexion->close();
        ?>
    </div>

    <div class="container bg-light text-center d-flex justify-content-center align-items-center w-100">
        <button class="btn btn-secondary">
            <a href="index.php" class="text-white">Inténtalo de Nuevo</a>
        </button>
    </div>
</body>
</html>
