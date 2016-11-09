<?php
if ($_SESSION['tipo'] == 1) {
	?>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Website Admin</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="http://localhost/iseploreto.edu.pe/">Ver Sitio</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	<section id="secondary_bar">
		<div class="">
			<p>Bienvenido <?php echo $_SESSION['nombre']; ?></p>
		</div>
	</section><!-- end of secondary bar -->
	<aside id="sidebar" class="column">
		<hr/>
		<h3><a class="mostrarUser">Usuarios</a></h3>
		<div id="users">
			<a class="vagina" href="alumno" vagina="vagina">Alumnos</a>
			<a class="vagina" href="docente" vagina="vagina">Docentes</a>
			<a class="vagina" href="administrador" vagina="vagina">Administradores</a>
			<!--<a class="vagina" href="exalumnos" vagina="vagina">Exalumnos</a>-->
		</div>    
		<h3><a class="vagina" href="carreras" vagina="vagina">Carreras</a></h3>
		<h3><a class="vagina" href="unidades" vagina="vagina">Unidades</a></h3>
		<h3><a class="vagina" href="somos" vagina="vagina">Quienes somos</a></h3>
		<h3><a class="vagina" href="contacto" vagina="vagina">Contacto</a></h3>
		<h3>Admin</h3>
		<ul class="toggle">
			<li><a href="logout" class="salir">Cerrar sesion</a></li>
		</ul>
	</aside><!-- end of sidebar -->
	<section id="main" class="column"></section>
	<?php 
}else{
	?>
	<h2>Ud. no tiene autorizaciòn para estar acá</h2>
	<?php
}
?>