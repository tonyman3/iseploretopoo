<?php 
session_start();

if (isset($_SESSION['nombre'])) {
    header("location:inicio");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a la Intranet del ISEP Loreto.</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrap">
                    <p class="form-title">
                        Ingresa a nuestra Intranet</p>
                        <form class="login">
                            <input type="text" placeholder="Usuario" id="user"/>
                            <input type="password" placeholder="Contraseña" id="pass"/>
                            <input type="submit" value="Ingresar" class="btn btn-success btn-sm" id="validarlogin"/>
                            <input type="hidden" value="in" id="in">
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/codiguillo.js"></script>
        <script>
        /*$("#validarlogin").on('click', function login(){

                var username = $("#user").val();
                var password = $("#pass").val();
                var login = $("#in").val();

                if((username == "") || (password == "")) {
                    $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Por favor ingrese un Nombre de usuario y contraseña</div>");
                }else {
                    //alert(username + pass)
                    $.ajax({
                        type: "POST",
                        url: "funciones/funciones.php",
                        data: "user=" + username + "&pass=" + password+"&orden="+login,
                        success: function(html){    
                            if(html=='true') {
                                window.location="inicio";
                            }else{
                                $("#message").html(html);
                            }
                        },
                        beforeSend:function(){
                            $("#message").html("<p class='text-center'><img src='img/loading.gif'></p>")
                        }
                    });
                }
                return false;
            });*/

        </script>
    </body> 
    </html>