<?php 
require 'cnx/finalcnx.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenidos al ISEP Loreto</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="<?php echo ruta ?>css/estilos.css">
        <link rel="stylesheet" href="<?php echo ruta ?>css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?php echo ruta ?>js/amazingslider-1.css">
        <link rel="stylesheet" href="<?php echo ruta ?>css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo ruta ?>js/jquery-ui-1.11.1/jquery-ui.css"/>
        <link rel="stylesheet" href="<?php echo ruta ?>js/jquery-ui-1.11.1/jquery-ui.structure.css"/>
        <link rel="stylesheet" href="<?php echo ruta ?>js/jquery-ui-1.11.1/theme.css"/>
    </head>
    <body>
        <?php include 'inc/header.php'; ?>	
        <section>		
            <?php include 'pag/content.php'; ?>		
        </section>	
        <?php include 'inc/footer.php'; ?>

        <script src="<?php echo ruta ?>js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo ruta ?>js/bootstrap.min.js"></script>
        <script src="<?php echo ruta ?>js/amazingslider.js"></script>
        <script src="<?php echo ruta ?>js/initslider-1.js"></script>
        <script src="<?php echo ruta ?>js/jquery.bootpag.min.js"></script>
        <script src="<?php echo ruta ?>js/codiguillo.js"></script>
        <script src="<?php echo ruta ?>js/jquery-validation-1.10.0/dist/jquery.validate.min.js"></script>
        <script src="<?php echo ruta ?>js/jquery-validation-1.10.0/lib/jquery.metadata.js"></script>
        <script src="<?php echo ruta ?>js/jquery-validation-1.10.0/localization/messages_es.js"></script>
        <script src="<?php echo ruta ?>js/jquery.printarea.js"></script>
        <script src="<?php echo ruta ?>js/jquery-ui-1.11.1/jquery-ui.min.js"></script>
    </body>
</html>
