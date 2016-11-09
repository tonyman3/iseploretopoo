<?php
$id =$_GET['id'];
$db_handle = new mariamedebe();

$consulta = $db_handle->runQuery("SELECT idCarrera, perfil FROM carreras WHERE idCarrera like '$id'");
if (!empty($consulta)){ 
    foreach($consulta as $key=>$value){
        $contenido =$consulta[$key]['perfil'];
    }
}
echo "<div id='tabs'>
<ul class='cabecera'>
    <li><a href='#tabs-1'>PERFIL PROFESIONAL</a></li>
    <li><a href='#tabs-2'>UNIDADES Y SILABOS</a></li>
    <li><a href='#tabs-3'>TAREAS</a></li>
</ul>
<div id='tabs-1'>
    <article>'$contenido'
    </article>
</div>
<div id='tabs-2'>
    <br><input type='hidden' value='$id' id='idcarrera'>
    <a href='I' class='semestre btn btn-success'>SEMESTRE I</a>
    <a href='II' class='semestre btn btn-success'>SEMESTRE II</a>
    <a href='III' class='semestre btn btn-success'>SEMESTRE III</a>
    <a href='IV' class='semestre btn btn-success'>SEMESTRE IV</a>
    <a href='V' class='semestre btn btn-success'>SEMESTRE V</a>
    <a href='VI' class='semestre btn btn-success'>SEMESTRE VI</a><br>
    <div class='semestre-mostrar'></div>
</div>
<div id='tabs-3'>
    <article>
        <h4>Otro contenido</h4>
    </article>
</div>
</div>";
?>