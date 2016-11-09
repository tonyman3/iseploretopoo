<?php

$dato = $_POST['d'];

if($dato == 'user'){
    
    $ruta = include 'usuarios.php';
      
}elseif($dato == 'carreraAdd'){
    
    $ruta = include 'carreraAdd.php';
      
}elseif($dato == 'noticias'){
    
    $ruta = include 'noticias.php';
      
}elseif($dato == 'carreras'){
    
    $ruta = include 'carreras.php';
      
}
?>