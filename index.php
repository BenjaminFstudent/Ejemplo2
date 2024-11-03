<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso al sistema</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-info">
    <div class="container w-100 d-flex flex-column align-items-center mt-5">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accept_cookies'])) {
            setcookie('accept_cookies', 'yes', time() + (86400 * 30), "/"); // 30 días
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }

        // Verificar si se ha recibido el parámetro 'expired' y mostrar el mensaje correspondiente
        if (isset($_GET['expired']) && $_GET['expired'] === 'true') {
            echo "<div class='border border-danger col-4 text-center mt-3 bg-dark font-light text-white'>
            <p>Tu sesión ha expirado. Por favor, inicia sesión nuevamente.</p></div>";
        }
        ?>

        <div class="container col-6 border border-dark text-center mt-3 bg-dark text-white">
            <h2>Bienvenido</h2>
        </div>
        <?php if (!isset($_COOKIE['accept_cookies'])): ?>
        <div class="bg-dark text-white border border-warning font-italic text-center col-6 mt-3">
            Este sitio web utiliza cookies para mejorar la experiencia del usuario.
            <form method="POST">
                <button type="submit" name="accept_cookies" value="yes" class="btn btn-light border border-dark mt-2">Aceptar</button>
            </form>
        </div>
        <?php endif; ?>
        <div class="container bg-light font-italic text-center col-6 border rounded border-info mt-3">
            <h2>Ingreso Usuario</h2>
            <div>
                <form action="validar.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="clave">Contraseña:</label>
                        <input type="password" id="clave" name="clave" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
            <div>
                <img src="logo.jpg" class="w-50 mt-3" alt="Logo">
            </div>    
        </div>

        
    </div>
</body>
</html>
