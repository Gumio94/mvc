<?php
/*
 *El archivo me va a servir para configurar rutas de aplicacion y base de datos
 * se definen valores absolutos para todo el sitio web 
*/

//Configuracion de acceso a la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');

//ruta de la aplicacion
define('RUTA_APP', dirname(dirname(__FILE__)));
/*
 * dirname sirve para volver a la carpeta contenedora de la direccion  
 * __FILE__ devuelve la ruta absoluta del archivo
*/
//ruta de la raiz
define('RUTA_URL', 'http://localhost/mvc');
//nombre de la pagina
define('NOMBRE_SITIO', 'Ejemplo MVC');