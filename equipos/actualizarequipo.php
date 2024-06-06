<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
     
     $Nombre = $_POST["Nombre1"];
     $Ciudad = $_POST["Ciudad1"];
     $Tecnico = $_POST["Tecnico1"];

     $sql = "INSERT INTO equipos
     (Nombre, Ciudad, Tecnico) 
     VALUES ('$Nombre', '$Ciudad', '$Tecnico')";
    $sql = "UPDATE equipos SET Nombre = $Nombre, Ciudad = $Ciudad, Tecnico = $Tecnico WHERE ID_equipo = $ID_equipo";
    mysqli_query($scon, $sql);
    mysqli_close($scon);

 echo $Tecnico;
?>