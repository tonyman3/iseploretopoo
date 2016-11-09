<?php
//sleep(10);
require_once ('../cnx/finalcnx.php'); 
$id = $_POST['idPerfil'];
$cont = $_POST['contenidoPerfil'];

$consulta = mysqli_query($con, "UPDATE carreras SET perfil='".$cont."' WHERE idCarrera='".$id."'");

//echo "1";

?>