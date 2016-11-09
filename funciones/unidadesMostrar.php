<?php
require("../cnx/finalcnx.php");
$db_handle = new mariamedebe();
//$db_handle2 = new mariamedebe();

$id = $_POST['idce'];
$sem = $_POST['semestre'];

if(!empty($id)){
    $sql = $db_handle->runQuery("SELECT idCurso, idSilabo, curso, horas, creditos FROM unidades WHERE semestre = '$sem' AND tipo ='$id'"); 
    $sql2 = $db_handle->runQuery("SELECT idCurso, idSilabo, curso, horas, creditos FROM unidades WHERE semestre = '$sem' AND tipo = 3"); 
    
        echo "<br><table class='table table-bordered table-hover table-condensed table-responsive'>
        <tr><td>UNIDADES DIDACTICAS</td><td>HORAS</td><td>CREDITOS</td></tr>";
        if(!empty($sql)){ 
            foreach($sql as $key=>$value){
                echo "<tr><td><a href='".$sql[$key]['idSilabo']."' class='descSilabo'>".$sql[$key]['curso']."</a></td><td>".$sql[$key]['horas']."</td><td>".$sql[$key]['creditos']."</td></tr>";
            }
        }                                                
        if(!empty($sql2)){ 
            foreach($sql2 as $key=>$value){
                echo "<tr><td><a href='".$sql2[$key]['idSilabo']."' class='descSilabo'>".$sql2[$key]['curso']."</a></td><td>".$sql2[$key]['horas']."</td><td>".$sql2[$key]['creditos']."</td></tr>";
            }
        }                                                 
        echo "</table>";                   
}         
?>