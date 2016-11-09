<?php
if ($_SESSION['tipo'] == 1) {


?>
solo alumnos
<h2><a href="funciones/logout.php">Cerrar sesion</a></h2>
<?php 
}else{
    ?>
    <h2>Ud. no tiene autorizacion para estar aca</h2>
<?php
}
?>