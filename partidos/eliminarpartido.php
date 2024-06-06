<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_partido = $_POST['ID_partido'];

    $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

    if (!$scon) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM partidos WHERE ID_partido = $ID_partido";

    if (mysqli_query($scon, $sql)) {
        echo "Partido eliminado exitosamente";
    } else {
        echo "Error al eliminar el Partido: " . mysqli_error($scon);
    }

    mysqli_close($scon);
} else {
    echo "Acceso denegado";
}
?>
