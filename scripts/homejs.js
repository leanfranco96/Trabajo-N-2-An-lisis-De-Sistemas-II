//Cargar el módulo de clientes al hacer clic en el enlace de clientes//
            $(document).ready(function () {

                $("#equipos-link").click(function () {
                    $.get("equipos/", function (data) {
                        $("#workspace").html(data);
                    });
                });
                $("#jugadores-link").click(function () {
                    $.get("jugadores/", function (data) {
                        $("#workspace").html(data);
                    });
                });
                $("#partidos-link").click(function () {
                    $.get("partidos/", function (data) {
                        $("#workspace").html(data);
                    });
                });
                $("#estadisticas-link").click(function () {
                    $.get("estadisticas/", function (data) {
                        $("#workspace").html(data);
                    });
                });
            });
            /*window.addEventListener('popstate', function (event) {
                if (isLoggedIn()) {
                    // Si la sesión está activa, redirigir al login
                    window.location.href = '/login.php';
                }
            });
            function isLoggedIn() {
                // Verificar si la sesión del usuario está activa
                // (por ejemplo, leyendo una variable de sesión o llamando a un servicio de autenticación)
            }*/