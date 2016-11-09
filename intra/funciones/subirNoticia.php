<?php

include("../cnx/finalcnx.php");

$titulo = $_GET['tituloN'];
$contenido = $_GET['contenidoN'];
$foto = trim($_FILES['noticiaImg']['name']);

$ingresar = mysqli_query($con, "INSERT INTO noticias (titulo,contenido, img)VALUES('$titulo', '$contenido',  '$foto')");
move_uploaded_file($_FILES['noticiaImg']['tmp_name'], '../img/noticias/'.$foto);


if(mysqli_affected_rows($con) > 0){
    echo "La operacion fue exitosa";
}
?>