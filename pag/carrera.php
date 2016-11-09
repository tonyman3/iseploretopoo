<?php
//$con2 = mysqli_connect('localhost', 'root', 'MNF', 'loreto');
$id =$_GET['id'];

//$consulta = mysqli_query($con, 'SELECT idCarrera, nombre FROM carreras WHERE idCarrera = '$id'');

//$consulta = mysqli_query($con, 'SELECT idCarrera, nombre FROM carreras WHERE idCarrera = '$id'');
//while($res = mysqli_fetch_array($consulta)){

$consulta = mysqli_query($con, "SELECT idPerfil, contenido FROM perfil WHERE idPerfil = '$id'");
$res = mysqli_fetch_array($consulta);
$contenido =$res['contenido'];
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
</div>
";
// }
?>