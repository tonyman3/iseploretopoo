<?php 
session_start();

if (!isset($_SESSION['nombre']) && !isset($_SESSION['tipo'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Bienvenido a la Intranet del ISEP Loreto.</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" href="js/jquery-ui-1.11.1/jquery-ui.min.css"/>
        <link rel="stylesheet" href="js/jquery-ui-1.11.1/jquery-ui.structure.min.css"/>
        <link rel="stylesheet" href="js/jquery-ui-1.11.1/theme.css"/>
        <link rel="stylesheet" href="css/admin/css/ie.css"/>
        <link rel="stylesheet" href="css/admin/css/layout.css"/>
    </head>
    <body>
        <?php include 'pag/content.php'; ?>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.bootpag.min.js"></script>
        <script src="js/codiguillo.js"></script>
        <script src="js/jquery-validation-1.10.0/dist/jquery.validate.min.js"></script>
        <script src="js/jquery-validation-1.10.0/lib/jquery.metadata.js"></script>
        <script src="js/jquery-validation-1.10.0/localization/messages_es.js"></script>
        <script src="js/jquery.printarea.js"></script>
        <script src="js/jquery-ui-1.11.1/jquery-ui.min.js"></script>
        <script src="js/tinymce/tinymce.min.js"></script>
        <script>
            //function tini(){

            tinymce.init({
                selector: "textarea",

                plugins:[
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'insertfile undo redo | styleselect 1 bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_css: 'js/tinymce/skins/lightgray/content.min.css'
            }); 
        </script>
    </body>
</html>