<?php
session_start();
require '../cnx/finalcnx.php';
$db_handle = new mariamedebe();

$user = $_POST['user']; 
$pass = $_POST['pass']; 

// To protect MySQL injection
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
$user = $db_handle->escape($user);
$pass = $db_handle->escape($pass);

$consulta = $db_handle->runQuery("SELECT idUser, idNombre, tipo FROM usuarios WHERE user='$user' and pass='$pass'");

if (!empty($consulta)) { 
    foreach($consulta as $key=>$value){
        $tipo = $consulta[$key]['tipo'];

        if($tipo == 2 || $tipo == 3 || $tipo == 4){
            $consulta2 = $db_handle->runQuery("SELECT p.nombre as nombre FROM usuarios AS u, personal AS p WHERE p.idPersonal = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
        }elseif($tipo == 1){
            $consulta2 = $db_handle->runQuery("SELECT a.nombre as nombre FROM usuarios AS u, alumnos AS a WHERE a.idAlumno = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
        }

        /*if($tipo == 2){
            $consulta2 = $db_handle->runQuery("SELECT p.nombre as nombre FROM usuarios AS u, personal AS p WHERE p.idPersonal = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
        }elseif($tipo == 1){
            $consulta2 = $db_handle->runQuery("SELECT a.nombre as nombre FROM usuarios AS u, alumnos AS a WHERE a.idAlumno = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
        }elseif($tipo == 3){
            $consulta2 = $db_handle->runQuery("SELECT p.nombre as nombre FROM usuarios AS u, personal AS p WHERE p.idPersonal = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
        }elseif($tipo == 4){
            $consulta2 = $db_handle->runQuery("SELECT p.nombre as nombre FROM usuarios AS u, personal AS p WHERE p.idPersonal = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
        }*7
        //$count = $db_handle->numRows($consulta);

        //if($count==1){

            /*if (!empty($consulta)) { 
                foreach($consulta as $key=>$value){*/
                    echo "true";
                    $_SESSION['tipo'] = $consulta[$key]['tipo'];
                    $_SESSION['nombre'] = $consulta2[$key]['nombre'];
               /*}
            }*/
    // Register $myusername, $mypassword and print "true"
        }
        
    }
else {
            echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Nombre de usuario o contraseña incorrecta</div>";
        }

// Mysql_num_row is counting table row
//$count = mysqli_num_rows($consulta);

// If consulta matched $myusername and $mypassword, table row must be 1 row
/*if($count==1){

    // Register $myusername, $mypassword and print "true"
    echo "true";
    $_SESSION['username'] = $res['user'];
    //$_SESSION['password'] = $res['pass'];
    $_SESSION['tipo'] = $res['tipo'];
    //$_SESSION['iduser'] = $res['id_usuario']; 
    $_SESSION['nombre'] = $res2['nombre'];

    mysqli_free_result($consulta);
}*/


//mysqli_close($con);
?>