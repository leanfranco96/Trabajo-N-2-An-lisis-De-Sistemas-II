<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_estadistica = $_POST['ID_estadistica'];

    $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

    if (!$scon) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM estadisticas WHERE ID_estadistica = $ID_estadistica";

    if (mysqli_query($scon, $sql)) {
        echo "Estadistica eliminada exitosamente";
    } else {
        echo "Error al eliminar Estadistica: " . mysqli_error($scon);
    }
    mysqli_close($scon);
} else {
    echo "Acceso denegado";
}
?>
