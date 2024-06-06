<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
     
     $Nombre = $_POST["Nombre"];
     $Ciudad = $_POST["Ciudad"];
     $Tecnico = $_POST["Tecnico"];

     $sql = "INSERT INTO equipos
     (Nombre, Ciudad, Tecnico) 
     VALUES ('$Nombre', '$Ciudad', '$Tecnico')";
     mysqli_query($scon, $sql);
     mysqli_close($scon);

?>