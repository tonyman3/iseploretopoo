<?php
switch(isset($_GET['pag']) ? $_GET['pag']:''){	
	case "exalumnos": include ('pag/exalumnos.php'); break;
	case "superadministrador": include ('pag/super.php'); break;
	case "administrador": include ('pag/administrador.php'); break;
	case "docente": include ('pag/personal.php'); break;
	case "alumnos": include ('pag/alumnos.php'); break;
    case "carreras-tecnologicas": include ('pag/carrera.php'); break;
	default : include ('pag/inicio.php');
}
?>