<?php
require_once ('../cnx/finalcnx.php'); 

$con = new mariamedebe;

if (isset($_POST["orden"])) { //Checks if action value exists
    $action = $_POST["orden"];
    switch($action) { //Switch case for value of action
        case "editarCarrera": editarCarrera($con); break;
        case "addCarrera": addCarrera($con); break;
        case "traerN": traerNoticia($con, $action); break;
        case "traerP": traerPerfil($con, $action); break;
        case "in": login($con); break;
        case "vagina": vagina(); break;
        case "logout": logout(); break;
        case "administrador": addAdmin($con, $action); break;
        case "delN": eliminarN($con); break;
    }
}elseif (isset($_GET["orden"])) { //Checks if action value exists
    $action = $_GET["orden"];
    switch($action) { //Switch case for value of action
            //case "editarCarrera": editarCarrera($con); break;
        case "subirNoticia": subirNoticia($con); break;
        case "editarN": editarNoticia($con); break;
        case "pag": pag($con); break;
    }
}

function editarCarrera($con){

    $id = $_POST['id'];
    $cont = $_POST['contenido'];

    $consulta = $con->runQuery("UPDATE carreras SET perfil='".$cont."' WHERE idCarrera='".$id."'");

    echo "editarCarrera";
}
function subirNoticia($con){
    $titulo = $_GET['titulo'];
    $contenido = $_GET['contenido'];
    $foto = trim($_FILES['imagine']['name']);

    $ingresar = $con->insertar("INSERT INTO noticia (titulo,contenido, img)VALUES('$titulo', '$contenido',  '$foto')");
    move_uploaded_file($_FILES['imagine']['tmp_name'], '../img/noticias/'.$foto);

    if($ingresar>0){
        echo $ruta = include '../inc/noticias.php';
    }
}
function editarNoticia($con){
    $id = $_GET['id'];
    $titulo = $_GET['titulo'];
    $cont = $_GET['contenido'];

    if(isset($_FILES['imagine']['name']) && !empty($_FILES['imagine']['name'])){
        $foto = trim($_FILES['imagine']['name']);

        $upd = $con->insertar("UPDATE noticia SET titulo='$titulo' ,contenido='$cont', img='$foto' where id='$id'");
        move_uploaded_file($_FILES['imagine']['tmp_name'], '../img/noticias/'.$foto);
    }else{

        $upd = $con->insertar("UPDATE noticia SET titulo='$titulo' ,contenido='$cont' where id='$id'");
    }

    /*$foto = trim($_FILES['noticiaImg']['name']);

    $ingresar = mysqli_query($con, "INSERT INTO noticias (titulo,contenido, img)VALUES('$titulo', '$contenido',  '$foto')");
    move_uploaded_file($_FILES['noticiaImg']['tmp_name'], '../img/noticias/'.$foto);*/


    if($upd>0){
        echo $ruta = include '../inc/noticias.php';
    }
}
function traerPerfil($con, $action){

    $id = $_POST['id'];

    $consulta = "SELECT idCarrera, nombre, perfil FROM carreras where idCarrera = '".$id."'";

    $result = mysqli_query($con, $consulta);
    //guardamos en un array multidimensional todos los datos de la consulta

    $datos = array();

    while($row = mysqli_fetch_array($result))
    {
        $datos[] = array(
            'idperfil'          => $row['idCarrera'],
            'perfil'          => $row['perfil'],
            'titulo'          => $row['nombre'],
            'res'          => $action
            );
    }

    echo json_encode($datos);
}
function traerNoticia($con, $action){

    $id = $_POST['id'];
    $traer = $con->runQuery("SELECT id, titulo, contenido from noticia WHERE id = '$id'");
    $datos = array();

    if(!empty($traer)){ 
        foreach($traer as $key){
            $datos[] = array(
                'ide'          =>$key['id'],
                'titulo'      => $key['titulo'],
                'contenido'   => $key['contenido'],
                'res'         => $action
                );         
        }
    }
    echo json_encode($datos);
}
function addCarrera($con){
    $titulo = $_POST['titulo'];
    $contenido = $_POST['perfil'];

    $ingresar = mysqli_query($con, "INSERT INTO carreras (nombre,perfil)VALUES('$titulo','$contenido')");

    if(mysqli_affected_rows($con) > 0){
        echo "addCarrera";
    }
}
function login($con){
    session_start();

    $user = $con->escape($_POST['user']); 
    $pass = $con->escape($_POST['pass']); 

    $consulta = $con->runQuery("SELECT users, pass, idpersona FROM usuarios WHERE users='$user' and pass='$pass'");
    if (!empty($consulta)) { 
        foreach($consulta as $key){
            $tipo = $key['idpersona'];

           /*if($tipo == 2 || $tipo == 3 || $tipo == 4){
                $consulta2 = $con->runQuery("SELECT p.nombre as nombre FROM usuarios AS u, personal AS p WHERE p.idPersonal = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
            }*/
            

            /*if($tipo == 3){
                $consulta2 = $con->runQuery("SELECT nombre, tipo from usuarios u , admin a WHERE u.idNombre = a.id AND u.tipo = '$tipo'");
            }elseif($tipo == 4){
                $consulta2 = $con->runQuery("SELECT nombre, tipo from usuarios u , personal p WHERE u.idNombre = p.idPersonal AND u.tipo = '$tipo'");
            }elseif($tipo == 1){
                $consulta2 = $con->runQuery("SELECT a.nombre as nombre FROM usuarios AS u, alumnos AS a WHERE a.idAlumno = '".$consulta[$key]['idNombre']."' AND u.idNombre = '".$consulta[$key]['idNombre']."' AND u.tipo ='$tipo'");
            }*/

            $tipop = $con->runQuery("SELECT nombre, tipo_persona from personas where id = '$tipo'");
            if (!empty($tipop)) { 
                foreach($tipop as $key2){
                    $tipo = $key2['tipo_persona'];

                    $categ = $con->runQuery("SELECT id from tipo_personas WHERE id = '$tipo'");
                    
                    if (!empty($categ)) { 
                        foreach($categ as $key3){
                            $_SESSION['tipo'] = $key2['tipo_persona'];
                            $_SESSION['nombre'] = $key2['nombre'];
                            echo "true";
                        }
                    }
                }
            }
        }
    }
    else {
        echo "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Nombre de usuario o contraseña incorrecta</div>";
    }
}
function vagina(){
    $action = $_POST['d'];

    if($action == 'somos'){

        $ruta = include '../inc/somos.php';

    }elseif($action == 'noticias'){

        $ruta = include '../inc/noticias.php';

    }elseif($action == 'contacto'){

        $ruta = include '../inc/contacto.php';

    }elseif($action == 'carreras'){

        $ruta = include '../inc/carreras.php';

    }elseif($action == 'uAlumno'){

        $ruta = include '../inc/uAlumnos.php';

    }elseif($action == 'uDocente'){

        $ruta = include '../inc/uDocente.php';

    }elseif($action == 'administrador'){

        $ruta = include '../inc/uAdmin.php';

    }elseif($action == 'exalumnos'){

        $ruta = include '../inc/uExalumnos.php';

    }elseif($action == 'unidades'){

        $ruta = include '../inc/unidades.php';

    }elseif($action == 'eventos'){

        $ruta = include '../inc/eventos.php';

    }
}
function logout(){
    session_start();
    session_destroy();
}
function addAdmin($con, $action){
    $nombre = $_POST['nombre'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $ingresar = $con->insertar("INSERT INTO admin (nombre)VALUES('$nombre')");

    if($ingresar>0){
        $consulta = $con->runQuery("SELECT id from admin where nombre = '$nombre' order by id desc limit 1 ");
        if(!empty($consulta)){ 
            foreach($consulta as $key=>$value){
                $tipo= $con->runQuery("SELECT idtipo from tipouser where tipo = '$action'");
                if(!empty($tipo)){ 
                    foreach($tipo as $key=>$value){
                        //$tipo= $con->runQuery("SELECT idtipo from tipouser where tipo = '$orden'");
                        $ingresar = $con->insertar("INSERT INTO usuarios (idNombre,user,pass,tipo)VALUES('".$consulta[$key]['id']."', '$user', '$pass','".$tipo[$key]['idtipo']."')");
                        echo true;
                    }
                }
            }
        }     
    }else{
        echo "cagaos";
    }
}
function eliminarN($con){
    $id = $_POST['id'];
    $del = $con->insertar("DELETE FROM noticia WHERE id='$id'");

    if($del>0){
        $ruta = include '../inc/noticias.php';
    }else{
        echo "ocurrio un error reintente";
    }
}
?>