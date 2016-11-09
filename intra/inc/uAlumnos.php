<?php 

?>
<table class="table table-striped table-bordered table-hover">
    <tr>
        <td colspan="4"><button type="button" class="addUser btn btn-primary btn-lg" data-toggle="modal" data-target=".modalAdd" orden="">Agregar Alumno</button></td>

    </tr>
    <tr>
        <td>Titulo</td>
        <td>Contenido</td>
        <td>Imagen</td>
        <td>Editar | Eliminar</td>
    </tr>
    <?php 
    ?>
    <tr>
        <td><?php  ?></td>
        <td><?php  ?></td>
        <td><?php  ?></td>
        <td><h3><a class="editar" data-toggle="modal" data-target=".modalEdit" orden="traerN" datos="<?php  ?>">Editar</a></h3> | <h3><a href="<?php  ?>">Eliminar</a></h3></td>
    </tr>
    <?php
        
    ?>
</table>