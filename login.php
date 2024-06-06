<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}


// Recibe los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
// Consulta la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$username' AND contrasena = '$password' AND email = '$email'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "correcto"; // Inicio de sesión exitoso
    session_start();
    ob_start();
    $_SESSION['nombre_usuario'] = $username; //Guarda el nombre de usuario en la sesión
    $_SESSION['iniciosesion'] = 'correcto';
} else {
    echo "error"; // Usuario o contraseña incorrectos
    session_start();
    ob_start();
    $_SESSION['nombre_usuario'] = ''; // Guarda el nombre de usuario en la sesión
    $_SESSION['iniciosesion'] = 'error';
}

$conn->close();
?>
