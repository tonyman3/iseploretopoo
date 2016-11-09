<?php
if ($_SESSION['tipo'] == 2) {

include("../cnx/finalcnx.php"); 

$sql = mysqli_query($con, "SELECT idCurso, curso FROM unidades"); 

?>
<form id="silaboForm">
    <input type="file" id="foto" name="foto"/>
    <select id="curso" name="curso">
        <?php
        while($res =mysqli_fetch_array($sql)){
        ?>
        <option value="<?php echo $res['idCurso']; ?>"><?php echo $res['curso']; ?></option>
        <?php    
        }
        ?>
    </select>

    <input type="submit" value="Subir silabo" class="btn btn-primary">
    <!--<button class="btn btn-primary" id="openSilabo">Agregar silabo</button>-->
</form>

<img src="img/loading.gif" class="cargando" id="cargando"/>
<div class="ventanaSilabo" Title="Agregar Silabo">						

</div>

<h2><a href="funciones/logout.php">Cerrar sesion</a></h2>
<?php 
}else{
    ?>
    <h2>Ud. no tiene autorizacion para estar aca</h2>
<?php
}
?>