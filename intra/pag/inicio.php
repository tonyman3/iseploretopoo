<?php 
switch ($_SESSION['tipo']) {
    case '2':
    header('Location: administrador'); 
    break;
    case '4':
    header('Location: docente'); 
    break;
    case '3':
    header('Location: exalumnos');	    
    break;		 
    case '1':				
    header('Location: superadministrador');
    break;					
    default: header('Location: login.php');						
}
?>	
