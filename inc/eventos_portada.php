<?php
$db_handle = new mariamedebe();
$eventos = $db_handle->runQuery("SELECT id,titulo, img FROM eventos ORDER BY id DESC LIMIT 4");
?>
<section class="right">
    <h2>Eventos</h2>
    <?php
    if (!empty($eventos)) { 
        foreach($eventos as $key){
            $titulo = urls_amigables($key['titulo']);
            ?>
    <article class="evento-portada">
        <img src="img/<?= $key['img'];?>" alt="" >
        <h4><a href="<?= ruta.'detalleEvento/'.$key['id'].'/'.$titulo;?>"><?= $key['titulo']; ?></a></h4>
    </article>
    <?php
        }
    }?>
   
</section>