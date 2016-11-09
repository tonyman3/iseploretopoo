<?php
include("../cnx/finalcnx.php");

//$id = $_POST['id'];
//+"&id="+id
$id = $_GET['curso'];
$foto = trim($_FILES['foto']['name']);

$ingresar = mysqli_query($con, "INSERT INTO silabo (curso,silabonombre)VALUES('$id','$foto')");
move_uploaded_file($_FILES['foto']['tmp_name'], 'silabos/'.$foto);
$consulta = mysqli_query($con, "SELECT idSilabo from silabo order by idSilabo DESC");
$res = mysqli_fetch_array($consulta);

$ingresar2 = mysqli_query($con, "UPDATE unidades SET idSilabo = '".$res['idSilabo']."' where idCurso = '$id' ");

if(mysqli_affected_rows($con) > 0){
    echo "El archivo se subio correctamente";
}
?>