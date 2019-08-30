<?php
/*
 * Trae todos las clases / archivos necesarios para funcionar
 */

//trae el archivo que hay que configurar
require_once 'config/configurar.php';

//trae las clases principales
require_once 'librerias/DB.php';
require_once 'librerias/Controlador.php';
require_once 'librerias/Core.php';

//carga todo el resto de las clases
spl_autoload_register(function ($nombre_clase){
    require_once 'librerias/'. $nombre_clase . '.php'; 
});