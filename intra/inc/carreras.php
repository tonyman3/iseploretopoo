<?php
$con = new mariamedebe;
//$querycarrera = mysqli_query($con, "select idCarrera as id, perfil from carreras"); 
$consulta = $con->runQuery("SELECT idCarrera as id, perfil from carreras");
?>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="2"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".modalAdd">Agregar carrera</button></td>
    </tr>
    <tr>
        <td><h3>Perfil</h3></td>
        <td><h3>Editar | Eliminar</h3></td>
    </tr>
    <?php 
    //while($rescar = mysqli_fetch_array($querycarrera)){
    if(!empty($consulta)){ 
        foreach($consulta as $key=>$value){
            ?>
            <tr>
                <td><?php echo $consulta[$key]['perfil']; ?></td>
                <td><h3><a class="editar" orden="traerP" data-toggle="modal" data-target=".modalEdit" datos="<?php echo $consulta[$key]['id']; ?>">Editar</a></h3> | <h3><a href="<?php echo $consulta[$key]['id']; ?>">Eliminar</a></h3></td>
            </tr>
            <?php
        } 
    }  
    ?>
</table>
<!--<div class="modal fade modalAdd">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar carrera</h4>
            </div>
            <form class="jormulario">  
                <div class="modal-body">                     
                    <p>Carrera: <input type="text" name="titulo" id="tituloC" class="form-control"></p>
                    <p>Perfil: <textarea name="perfil" id="perfilC" cols="30" rows="10"></textarea></p>         
                    <input type="hidden" name="orden" value="addCarrera">     
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Agregar" class="btn btn-primary">  
                </div>
            </form>
        </div>
    </div>
</div>-->

<div class="modal fade modalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Carrera</h4>
            </div>
            <form class="jormulario">
                <div class="modal-body">
                    <p>Titulo: <input type="text" name="titulo" class="titulo form-control"></p>
                    <p>Contenido: <textarea name="contenido" id="contenidoPerfil" cols="30" rows="10"></textarea></p>
                    <input type="hidden" name="id" id="idPerfil">
                    <input type="hidden" name="orden" value="editarCarrera">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Editar perfil" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>