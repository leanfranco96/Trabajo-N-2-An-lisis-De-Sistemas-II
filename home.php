<?php
// Inicia sesión si no está iniciada
session_start();
ob_start();
if ($_SESSION ['iniciosesion'] == 'correcto'){
    $usuarioact = $_SESSION['nombre_usuario'];
}else {
    header("Location: index1.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Gestión FUSAFOR</title>
    <link rel="stylesheet" href="estilos/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!-- Logo en el centro -->
            <a class="navbar-brand mx-auto" href="#">
                <img src="img/pelota.png" alt="Logo" height="30">
            </a>

            <!-- Botón para colapsar en dispositivos pequeños -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Módulos de ejemplo en el Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">FU.SA.F<img src="img/pelota.png" alt="" img
                                width="18">R</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="equipos-link">Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="jugadores-link">Jugadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="partidos-link">Partidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="estadisticas-link">Estadisticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" id="cerrarsesion">Cerrar Sesión</a>
                    </li>
                    <!-- Agrega más módulos según tus necesidades -->
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- Área de trabajo central -->
    <div class="container mt-4" id="workspace">
        <!-- Contenido de tu sistema, aquí puedes cargar dinámicamente tus módulos -->
        <div class="text-center">
            <p style="color: aliceblue; font-style: italic; font-size: 80px;">Sistema de Gestión FU.SA.F<img
                    src="img/pelota.png" alt="" img width="80">R</p>
            <p style="color: aliceblue; font-size: 30px;">FUSAFOR es una asociación que organiza torneos de futsal en la
                provincia de Formosa, donde participan dos
                categorías. La función principal es llevar un control estadístico de cada partido, club, jugadores, como
                así también el cobro de aranceles, cumplimientos de las reglamentaciones y elevar dicha información a
                las partes pertinentes.</p>
        </div>

        <!-- Scripts de Bootstrap, jQuery y dependencias -->

        <h1 style="text-align: center; color:#ffffff">Tecnicatura Universitaria en Analisis y Diseño de Software</h1>
        <h1 style="text-align: center; color:#ffffff">Escuela de Formación Profesional U.N.a F</h1>
        <div class="container overflow-hidden text-center">
            <div class="row gy-5">
                <div class="col-3">
                    <div class="p-3">
                        <h2 style="text-align: left; color:#ffffff">GRUPO</h2>
                        <ul style="text-align: left; color:#ffffff">
                            <li>Del Valle, Micaela Mariel</li>
                            <li>Franco, Leandro Ramon</li>
                            <li>Galeano, Fausto Emmanuel</li>
                            <li>Escobedo, Cristian Eduardo</li>
                            <li>Medina, Aldana Belén</li>
                        </ul>
                    </div>
                </div>
                <div class="col-3">
                    <div class="p-3">
                        <h2 style="text-align: left; color:#ffffff">Profesor</h2>
                        <ul style="text-align: left; color:#ffffff">
                            <li>Riveros, Gabriel E.</li>
                        </ul>
                    </div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../pruebita/scripts/homejs.js"></script>
</body>

</html>