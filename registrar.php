<?php
include("condb.php");
if (isset($_POST['registro'])){
    if (strlen($_POST['name']) >= 1 && strlen($_POST['email']) >= 1) {
        $name = trim($_POST['name']);
        $contrasena = trim($_POST['contrasena']);
        $email = trim($_POST['email']);
        $fechareg = date("d/m/y");
        $consulta = "INSERT INTO usuarios(nombre_usuario, contrasena, email, fecha_registro) VALUES ('$name','$contrasena','$email','$fechareg')";
        $resultado = mysqli_query($conex,$consulta);
        if($resultado){
           ?>
           <h3 class="ok">Se ha registrado correctamente</h3>
           <?php
           } else {
            ?>
            <h3 class="bad">Ha ocurrido un error</h3>
            <?php
           }
    } else {
        ?>
        <h3 class="bad">Por favor complete los campos</h3>
        <?php
    }
}
?>