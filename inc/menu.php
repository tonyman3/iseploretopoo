<?php
$db_handle = new mariamedebe();
$querymenu = $db_handle->runQuery("SELECT id, nombre,sub from nav");
?>
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>   
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="main-menu" class="nav navbar-nav mayus">
            <?php if (!empty($querymenu)){ 
                foreach($querymenu as $key=>$value){
                    if($querymenu[$key]['sub'] == 0){     
                        $titulouno = urls_amigables($querymenu[$key]['nombre']); ?>
                        <li><a href="<?= ruta.$titulouno; ?>"><?= $querymenu[$key]['nombre']; ?></a></li>
                        <?php } elseif ($querymenu[$key]['sub'] == 1){ ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $querymenu[$key]['nombre']; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php
                                $querysub = $db_handle->runQuery("SELECT s.nombre as nombre, s.id as id, t.nombre as topic from nav n, sub s, topico t where n.id = '".$querymenu[$key]['id']."' AND s.idnav = '".$querymenu[$key]['id']."' AND s.idtopico = t.id");

                                if (!empty($querysub)){ 
                                    foreach($querysub as $key=>$value){
                                        $titulodos = urls_amigables($querysub[$key]['nombre']);
                                        $topic = urls_amigables($querysub[$key]['topic']);?>
                                        <li><a href="<?= ruta.$topic. "/". $querysub[$key]['id']."/".$titulodos; ?>" target="_blank"><?= $querysub[$key]['nombre']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                    <?php }?>
                                </li>
                                <?php
                            }
                        }
                    } ?>
                </ul>
            </div>
        </nav>