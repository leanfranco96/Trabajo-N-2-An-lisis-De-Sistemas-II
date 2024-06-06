<?php
// Inicia sesión si no está iniciada
session_start();

// Destruye la sesión
session_destroy();
    $_SESSION['nombre_usuario'] = ''; // Guarda el nombre de usuario en la sesión
    $_SESSION['iniciosesion'] = 'error';

// Redirige al usuario a la página de inicio de sesión
header("Location: index1.php");
exit;
?>