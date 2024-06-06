<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'login_db');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
     
     $nombre_usuario = $_POST["nombre_usuario"];
     $contrasena = $_POST["contrasena"];
     $email = $_POST["email"];
 $sql = "INSERT INTO usuarios
 (nombre_usuario, contrasena, email) 
 VALUES ('$nombre_usuario', '$contrasena', '$email')";

    mysqli_query($scon, $sql);
    mysqli_close($scon);

?>