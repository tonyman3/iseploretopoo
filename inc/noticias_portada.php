<?php
$db_handle = new mariamedebe();
$noticias = $db_handle->runQuery("SELECT id,titulo, left(contenido,194) AS acortar, img FROM noticia ORDER BY id DESC LIMIT 4");
?>
<section class="left">
    <h2>Noticias</h2>
    <?php
    if (!empty($noticias)) { 
        foreach($noticias as $key){
            $titulo = urls_amigables($key['titulo']);
            ?>
            <div class="noticias">
            <img src="intra/img/noticias/<?= $key['img'];?>" alt="" width="250" height="150">
                <div class="noticias2">
                    <h3><?= $key['titulo']; ?></h3>
                    <p><?= $key['acortar']; ?></p>   
                    <a href="<?= ruta.'detalleNoticia/'.$key['id'].'/'.$titulo;?>" target="blank">Leer más</a> 
                </div>
            </div>
            <?php
        }
    }?>
    <a href="noticias" target="blank"><strong>Ver más noticias</strong></a>
    <a href="eventos" target="blank"><strong>Ver más eventos</strong></a>
</section>