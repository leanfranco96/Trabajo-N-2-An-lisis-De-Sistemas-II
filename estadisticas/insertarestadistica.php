<?php
     
     $scon = mysqli_connect('localhost', 'root', '', 'fusafor_bd');

     if (!$scon) {
         die("Connection failed: " . mysqli_connect_error());
     }
     
     $JugadorID = $_POST["JugadorID"];
     $PartidoID = $_POST["PartidoID"];
     $Goles = $_POST["Goles"];
     $TarjetasAmarillas = $_POST["TarjetasAmarillas"];
     $TarjetasRojas = $_POST["TarjetasRojas"];
 $sql = "INSERT INTO estadisticas
 (JugadorID, PartidoID, Goles, TarjetasAmarillas, TarjetasRojas) 
 VALUES ('$JugadorID', '$PartidoID', '$Goles', '$TarjetasAmarillas', '$TarjetasRojas')";

    mysqli_query($scon, $sql);
    mysqli_close($scon);

?>