<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Registro</title>
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
    <div class="container col-7 d-flex flex-column align-items-center mt-5 border border-dark p-4 bg-light rounded">
        <?php
        include("conexion.php");
        echo"<div class='container text-center  '>";
        include("menu.php");
        echo"</div>";
        include("gestion_sesion.php");
        verificarSesion();

        // Deshabilitar caché del navegador
        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0"); // Proxies.
        ?>

        <u class="h3 mb-4">Bienvenido</u>

        <div class="bg-dark text-center text-white p-4 rounded w-100 mb-4">
            <h2>Registro de Personal</h2>
            <div class="d-flex justify-content-around">
                <a href="nuevo_registro.php" class="btn btn-success">Nuevo Registro</a>
                <a href="buscar_personal.php" class="btn btn-primary">Modificar Registro</a>
                <a href="buscar_eliminar.php" class="btn btn-danger">Eliminar Registro</a>
            </div>
        </div>

        <?php
        $mostrar = "SELECT * FROM personal";
        $resultado = $conexion->query($mostrar);

        if ($resultado->num_rows > 0) {
            echo '<table class="table table-striped table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Rut</th>';
            echo '<th>Nombre</th>';
            echo '<th>Edad</th>';
            echo '<th>Cargo</th>';
            echo '<th>Sueldo</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($registro = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($registro["id"]) . '</td>';
                echo '<td>' . htmlspecialchars($registro["rut"]) . '</td>';
                echo '<td>' . htmlspecialchars($registro["nombre"]) . '</td>';
                echo '<td>' . htmlspecialchars($registro["edad"]) . '</td>';
                echo '<td>' . htmlspecialchars($registro["cargo"]) . '</td>';
                echo '<td>' . htmlspecialchars($registro["sueldo"]) . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning">No se encontraron registros.</div>';
        }

        $conexion->close();
        ?>
    </div>
</body>
</html>

