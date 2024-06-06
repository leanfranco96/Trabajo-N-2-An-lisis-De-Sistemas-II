<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Inicio de Sesi&oacuten</title>
    <link rel="stylesheet" href="stylo.css">
    <link rel="stylesheet" href="/estilos/estiloind3.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../scripts/scriptind3.js"></script>
</head>

<body>
    <h2>Iniciar Sesi&oacute;n</h2>
    <div class="cajacontenedora">
    <form id="login-form">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Contrase&ntilde;a:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electr&oacute;nico:</label>
                <input type="email" name="email" id="email" class="form-control" required>
                <br>
            </div>
            <input type="submit" value="Iniciar Sesi&oacute;n" class="btn btn-primary">
    </form>
    <div id="message"></div>
    </div>
    <h2 class="caja2">Registro</h2>
    <div class="cajacontenedora2">
        <form method="post">
            <label for="username">Ingrese un nombre de usuario</label>
            <input type="text" name="name"  class="form-control">
            <label for="username">Ingrese una contrase&ntilde;a</label>
            <input type="contrasena" name="contrasena" class="form-control">
            <label for="username">Ingrese el correo electr&oacute;nico</label>
            <input type="email" name="email" class="form-control">
            <input type="submit" name="registro" value="Registrarse" class="btn btn-primary">
        </form>
        <?php
        include("registrar.php")
        ?>
    </div>
</body>

</html>