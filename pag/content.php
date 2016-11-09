<?php
switch(isset($_GET['pag']) ? $_GET['pag']:''){	
	case "egresados": include ('pag/exalumnos.php'); break;
	case "eventos": include ('pag/eventos.php'); break;
	case "noticias": include ('pag/noticias.php'); break;
	case "detalleEvento": include ('pag/eventosDetalle.php'); break;
	case "detalleNoticia": include ('pag/noticiasDetalle.php'); break;
	case "transparencia": include ('pag/transparencia.php'); break;
	case "contacto": include ('pag/contacto.php'); break;
	case "capacitaciones": include ('pag/capacitaciones.php'); break;
	case "quienes-somos": include ('pag/quienes_somos.php'); break;
	case "carrera-pedagogica": include ('pag/carrerapedagogica.php'); break;
	case "contacto": include ('pag/contacto.php'); break;
	case "personal": include ('pag/personal.php'); break;
    case "carrera-tecnica": include ('pag/carreratecnica.php'); break;
        
	default : include ('pag/inicio.php');
}
?>