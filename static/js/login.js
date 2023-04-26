$(document).ready(function () {
    // Volver al Login
    $(".close").click(function () {
        $("#login").css("display","flex");
        $("#registration").css("display","none");
        $("#recover").css("display","none");
    });

    // Ir de iniciar a registrarse
    $("#registerlink").click(function () {
        $("#login").css("display","none");
        $("#registration").css("display","flex");
    });

    // Ir de Iniciar Session a Recuperar
    $("#recoverlink").click(function () {
        $("#login").css("display","none");
        $("#recover").css("display","flex");
    });

    $("#closeModel").click(function () {
        $("#login").css("display","none");
        $("#registration").css("display","none");
        $("#recover").css("display","none");
        $("#createpass").css("display","flex");
    });
});