<?php 
$con = new mariamedebe;

$consulta = $con->runQuery("SELECT p.nombre as nombre, u.users as user, u.pass as pass, u.id as id from usuarios u, personas p WHERE p.tipo_persona = 2 AND u.idpersona = p.id");
?>
<table class="table table-striped table-bordered table-hover">
    <tr>
    <td colspan="4"><button type="button" class="addUser btn btn-primary btn-lg btn-add" data-toggle="modal" data-target=".modalAdd" orden="">Agregar Administrador</button></td>
    </tr>
    <tr>
        <td>Usuario</td>
        <td>Nombre</td>
        <!--<td>Contraseña</td>-->
        <td>Editar | Eliminar</td>
    </tr>
    <?php 
    if(!empty($consulta)){ 
        foreach($consulta as $key){
            ?>
            <tr>
                <td><?= $key['nombre']; ?></td>
                <td><?= $key['user']; ?></td>
                
                <td><h3><a class="editar" data-toggle="modal" data-target=".modalEdit" orden="traerN" datos="<?= $key['id']; ?>">Editar</a></h3> | <h3><a href="<?= $key['id']; ?>">Eliminar</a></h3></td>
            </tr>
            <?php            
        }
    }      
    ?>
</table>
<?php 
include 'formularioAdd.php'
?>