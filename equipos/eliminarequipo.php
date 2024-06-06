<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_equipo = $_POST['ID_equipo'];

    $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

    if (!$scon) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM equipos WHERE ID_equipo = $ID_equipo";

    if (mysqli_query($scon, $sql)) {
        echo "Equipo eliminado exitosamente";
    } else {
        echo "Error al eliminar el equipo: " . mysqli_error($scon);
    }

    mysqli_close($scon);
} else {
    echo "Acceso denegado";
}
?>
