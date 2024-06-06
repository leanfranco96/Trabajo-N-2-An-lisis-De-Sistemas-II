<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_jugador = $_POST['ID_jugador'];

    $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

    if (!$scon) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM jugadores WHERE ID_jugador = $ID_jugador";

    if (mysqli_query($scon, $sql)) {
        echo "Jugador eliminado exitosamente";
    } else {
        echo "Error al eliminar el Jugador: " . mysqli_error($scon);
    }

    mysqli_close($scon);
} else {
    echo "Acceso denegado";
}
?>
