<?php  
$id =$_GET['id'];
$db_handle = new mariamedebe();

$consulta = $db_handle->runQuery("SELECT titulo, contenido, img FROM eventos WHERE id ='$id'");
?>
<div class="container detalleNoticia">
	<?php
	if (!empty($consulta)){ 
		foreach($consulta as $key){
			?>
			<h2><?= $key['titulo']; ?></h2>
			<div class="detalleNoticiaImg">
				<img src="<?= ruta ?>intra/img/eventos/<?= $key['img']; ?>" alt="">
			</div>
			<article class="detalleNoticiaContent"><?= $key['contenido']; ?></article>
			<?php
		}
	}
	?>
</div>