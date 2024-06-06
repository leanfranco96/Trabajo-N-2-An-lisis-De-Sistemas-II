<?php
$scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

if (!$scon) {
    die("Connection failed: " . mysqli_connect_error());
}

$ID_Equipo = $_GET['ID_equipo'];

$sql = "SELECT Nombre, Ciudad, Tecnico FROM equipos WHERE ID_equipo = $ID_Equipo";

$result = mysqli_query($scon, $sql);

if (mysqli_num_rows($result) > 0) {
    $ID_equipo = mysqli_fetch_assoc($result);
    echo json_encode($ID_equipo);
} else {
    echo json_encode(array()); // Enviar un array vacío si no se encuentra el equipo.
}

mysqli_close($scon);
?>
