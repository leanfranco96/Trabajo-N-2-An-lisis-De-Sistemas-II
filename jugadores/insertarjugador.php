<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
     
     $Apellido = $_POST["Apellido"];
     $Nombre = $_POST["Nombre"];
     $FechaNacimiento = $_POST["FechaNacimiento"];
     $EquipoID = $_POST["EquipoID"];
     $Posicion = $_POST["Posicion"];

     $sql = "INSERT INTO jugadores
     (Apellido, Nombre, FechaNacimiento, EquipoID, Posicion) 
     VALUES ('$Apellido', '$Nombre', '$FechaNacimiento', '$EquipoID', '$Posicion')";

    mysqli_query($scon, $sql);
    mysqli_close($scon);
?>