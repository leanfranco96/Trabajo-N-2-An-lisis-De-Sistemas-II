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
                    window.location.href = "home.html";

                } else {
                    $("#message").html('Usuario o contrase&ntilde;a incorrectos.');
                }
            }
        });


    });
});