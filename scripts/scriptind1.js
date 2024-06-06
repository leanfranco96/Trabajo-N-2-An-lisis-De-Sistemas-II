$(document).ready(function () {
    // Mostrar el modal al hacer clic en el botón
    $("#openModalBtn").click(function () {
        $("#registroModal").css("display", "block");
    });

    // Ocultar el modal al hacer clic en la "X"
    $("#closeModalBtn").click(function () {
        $("#registroModal").css("display", "none");
    });

    // Ocultar el modal al hacer clic fuera de él
    $(window).click(function (event) {
        if (event.target === $("#registroModal")[0]) {
            $("#registroModal").css("display", "none");
        }
    });
    

    // ... (tu código de AJAX para el formulario de inicio de sesión)
    $(document).ready(function () {
    $("#login-form").submit(function (event) {
        event.preventDefault();
        let username = $("#username").val();
        let password = $("#password").val();
        let email = $("#email").val();
        $.ajax({
            type: "POST",
            url: "login.php",
            data: {
                username: username,
                password: password,
                email: email
            },
            success: function (response) {
                if (response === "correcto") {
                    //alert('la respuesta fue correcta');
                    $("#message").html("Inicio de sesi&oacute;n exitoso.");
                    window.location.href = "home.php";

                } else {
                    $("#message").html('Usuario, contrase&ntilde;a o email incorrectos.');
                }
            }
        });


    });
});
});
