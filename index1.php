<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Inicio de Sesión</title>
    <link rel="stylesheet" href="../pruebita/estilos/estiloind1.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../pruebita/scripts/scriptind1.js"></script>
</head>
<body>
<h1 style="text-align: left; color: #ffffff;">Iniciar Sesion FU.SA.F<img src="img/pelota.png" alt=""
                        img width="30">R</h1>
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
            <button class="btn btn-primary" id="openModalBtn">Registrarse</button>
        </form>
        <div id="message"></div>
    </div>
    <div class="grupito">
        <h2>Grupo 11</h2>
        </p>
        <ul>
            <li>Del Valle Mariel </li>
            <li>Escobedo Cristian</li>
            <li>Franco Leandro</li>
            <li>Galeano Fausto Emmanuel</li>
            <li>Medina Aldana</li>
        </ul>
    </div>
    <!-- Modal de Registro -->
    <div id="registroModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModalBtn">&times;</span>
            <form method="post">
            <label for="username">Ingrese un nombre de usuario</label>
            <input type="text" name="name"  class="form-control">
            <label for="username">Ingrese una contrase&ntilde;a</label>
            <input type="password" name="contrasena" class="form-control">
            <label for="username">Ingrese el correo electr&oacute;nico</label>
            <input type="email" name="email" class="form-control">
            <input type="submit" name="registro" value="Registrarse" class="btn btn-primary">
            <div id="registro-message" class="ok" style="display: none;"></div>
        </form>
        <?php
        include("registrar.php")
        ?>
    </div>
    
</body>
</html>
