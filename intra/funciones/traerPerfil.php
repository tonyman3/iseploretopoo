<?php

require_once ('../cnx/finalcnx.php'); 
$id = $_POST['carrera'];

$consulta = "SELECT idCarrera, perfil FROM carreras where idCarrera = '".$id."'";

	$result = mysqli_query($con, $consulta);
	//guardamos en un array multidimensional todos los datos de la consulta
	
	$datos = array();

while($row = mysqli_fetch_array($result))
{
    $datos[] = array(
        'idperfil'          => $row['idCarrera'],
        'perfil'          => $row['perfil']

    );
}

echo json_encode($datos);
 ?>