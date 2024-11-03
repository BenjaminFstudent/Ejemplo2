<?php
session_start();

function iniciarSesion($user_id) {
    if (isset($_COOKIE['accept_cookies']) && $_COOKIE['accept_cookies'] == 'yes') {
        $_SESSION['user_id'] = $user_id;
        $session_token = bin2hex(random_bytes(32));
        $_SESSION['session_token'] = $session_token;
        setcookie('user_id', $user_id, time() + (50), "/");
        setcookie('session_token', $session_token, time() + (50), "/");
    } else {
        echo "Debes aceptar las cookies para iniciar sesión.";
        exit();
    }
}

function cerrarSesion() {
    // Destruye todas las variables de sesión
    $_SESSION = array();

    // Destruye la cookie de la sesión
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destruye la sesión
    session_destroy();

    // Elimina las cookies de usuario y de token
    setcookie('user_id', '', time() - 3600, "/");
    setcookie('session_token', '', time() - 3600, "/");
    setcookie('accept_cookies', '', time() - 3600, "/");
}

function verificarSesion() {
  // Tiempo de expiración de la sesión en segundos (ajustar según necesidades)
  $session_expiration_time = 100; // 100 segundos 

    if (!isset($_SESSION['user_id']) || !isset($_COOKIE['user_id']) ||
        !isset($_SESSION['session_token']) || !isset($_COOKIE['session_token']) ||
        $_SESSION['session_token'] !== $_COOKIE['session_token']) {
        header("Location: index.php?expired=true");
        cerrarSesion();
        exit();
    }

    if (isset($_SESSION['session_start_time']) && (time() - $_SESSION['session_start_time'] > $session_expiration_time)) {
        cerrarSesion(); // Cerrar sesión si ha expirado
        exit();
    }
}
?>