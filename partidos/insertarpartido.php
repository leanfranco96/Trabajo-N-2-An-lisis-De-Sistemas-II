<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
        $EquipoLocalID = $_POST["EquipoLocalID"];
        $EquipoVisitanteID = $_POST["EquipoVisitanteID"];
        $Fecha = $_POST["Fecha"];
        $Hora = $_POST["Hora"];
        $Lugar = $_POST["Lugar"];
        $ResultadoLocal = $_POST["ResultadoLocal"];
        $ResultadoVisitante = $_POST["ResultadoVisitante"];

    $sql = "INSERT INTO partidos
    (EquipoLocalID, EquipoVisitanteID, Fecha, Hora, Lugar, ResultadoLocal, ResultadoVisitante) 
    VALUES ('$EquipoLocalID', '$EquipoVisitanteID', '$Fecha', '$Hora', '$Lugar', '$ResultadoLocal', '$ResultadoVisitante')";
    mysqli_query($scon, $sql);
    mysqli_close($scon);
?>