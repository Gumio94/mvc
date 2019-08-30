<?php
//trae el archivo de la cabecera 
require RUTA_APP.'/vistas/inc/header.php';?>

<?php
//recibe los datos del controlador y los pone donde corresponde
echo $datos['titulo'];
?>
<?php 
//trae el archivo de pie de pagina
require RUTA_APP.'/vistas/inc/footer.php';?>