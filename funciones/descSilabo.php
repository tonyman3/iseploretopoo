<?php
    include("../cnx/finalcnx.php");  
    
    $id = $_POST['idsi'];
    $sql = mysqli_query($con, "SELECT s.silabonombre as nombre FROM silabo as s, unidades as u WHERE s.idSilabo = '$id' AND u.idSilabo = '$id' "); 
    
    
    //$sql3 = mysqli_query($con, "SELECT curso, horas, creditos FROM unidades WHERE semestre = '$b' AND tipo = 3");
    
    //$silabos = mysqli_query($con, "SELECT u.curso, u.horas, u.creditos, s.silabonombre FROM unidades as u, silabo as s WHERE u.semestre = '$b' AND u.idCurso = 3 ");
    $row = mysqli_fetch_array($sql);
    $contar = mysqli_num_rows($sql);
    
    if($contar == 0){
        echo "No se han encontrado resultados.";
    }else{
        echo $row['nombre'];             
    }   
?>
