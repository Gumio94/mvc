<?php
require_once 'config/configurar.php';

require_once 'librerias/DB.php';
require_once 'librerias/Controlador.php';
require_once 'librerias/Core.php';

//carga las clases clases
spl_autoload_register(function ($nombre_clase){
    require_once 'librerias/'. $nombre_clase . '.php'; 
});