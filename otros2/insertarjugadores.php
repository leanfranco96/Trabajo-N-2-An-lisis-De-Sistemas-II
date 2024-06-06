<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
     
    
     
     $Apellido = $_POST["Apellido"];
     $Nombre = $_POST["Nombre"];
     $FechaNac = $_POST["FechaNac"];
     $EquipoID = $_POST["EquipoID"];
     $Posicion = $_POST["Posicion"];

     $sql = "INSERT INTO jugadores
     (Apellido, Nombre, FechaNacimiento, EquipoID, Posicion) 
     VALUES ('$Apellido', '$Nombre', '$FechaNac', '$EquipoID', '$Posicion')";

     if (mysqli_query($scon, $sql)) {
     echo "INSERTADO CORRECTAMENTE";
     } else {
     echo "Error en la inserción: " . mysqli_error($scon);
     }

     mysqli_close($scon);

?>