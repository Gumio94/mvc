<?php
/*
Esta clase sirve para redirigir a que parte de la aplicacion dirigir 
 * Tomando la url como Controlador/metodo/dato
 * Ejemplo:
 *      localhost/mvc/usuario/modificar/25
*/
class Core{
    protected $controlador_actual = "inicial";
    protected $metodo_actual="index";
    protected $parametros=[];
    
    public function __construct() {
        //print_r($this->getUrl());
        $url = $this->getUrl();
        
        //Busca si el controlador existe
        if(file_exists("../app/controladores/". ucwords($url[0]) .".php")){
            //si existe se setea como controlador por defecto
            $this->controlador_actual = ucwords($url[0]);
            unset($url[0]);
        }
        
        //requiere el controlador
        require_once '../app/controladores/'. $this->controlador_actual .'.php';
        $this->controlador_actual = new $this->controlador_actual;
        
        //chequeamos si se pasa un metodo
        if (isset($url[1])){
            //chequea el metodo existe dentreo del controlador
            if(method_exists($this->controlador_actual, $url[1])){
                //si existe lo seteamos 
                $this->metodo_actual = $url[1];
                unset($url[1]);
            }
        }
        
        //obtenemos los parametros 
        $this->parametros = $url ? array_values($url) : [];
        
        //llama al metodo y pasa los parametros como un array
        call_user_func_array([$this->controlador_actual, $this->metodo_actual], $this->parametros);
    }

    public function getUrl(){
        //echo $_GET["url"];
        if(isset($_GET["url"])){
            $url = rtrim($_GET["url"],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}