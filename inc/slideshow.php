<?php
$db_handle = new mariamedebe();
$consulta = $db_handle->runQuery("SELECT titulo, descripcion,img from slide order by id desc");
?>
<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;margin:0 auto 2em auto;">
    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
        <ul class="amazingslider-slides" style="display:none;">
         <?php if (!empty($consulta)){ 
            foreach($consulta as $key){ 
                ?>
                <li><img src="img/<?= $key['img']; ?>" alt="<?= $key['titulo']; ?>" data-description="<?= $key['descripcion']; ?>"/></li>
                <?php }
            }
            ?>
        </ul>
        <ul class="amazingslider-thumbnails" style="display:none;">
            <?php if (!empty($consulta)){ 
                foreach($consulta as $key){ 
                    ?>
                    <li><img src="img/<?= $key['img']; ?>" alt="<?= $key['titulo']; ?>" /></li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>