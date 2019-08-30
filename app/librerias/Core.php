<?php
/*
Esta clase sirve para redirigir a que parte de la aplicacion dirigir 
 * Tomando la url como Controlador / metodo / dato
 * Ejemplo:
 *      localhost/mvc/usuario/modificar/25
*/
class Core{
    protected $controlador_actual = "inicial";
    protected $metodo_actual="index";
    protected $parametros=[];
    
    public function __construct() {
        //ejecuta el metodo getUrl de la clase y lo guarda en la variable url
        $url = $this->getUrl();
        //la variable url es un arreglo de 3 posiciones
        
        //Busca si el controlador existe
        if(file_exists("../app/controladores/". ucwords($url[0]) .".php")){
            //si existe se setea como controlador por defecto
            $this->controlador_actual = ucwords($url[0]);
            //y libera la primer posicion del arreglo
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

    //el metodo que llama el constructor
    public function getUrl(){
        //verifica si se manda algo por url
        if(isset($_GET["url"])){
            //elimina del texto las /
            $url = rtrim($_GET["url"],'/');
            //elimina todos los caracteres especiales
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //transforma el texto en varios textos (lo pasa a un arreglo) dividiendolos por el caracter que marque
            $url = explode('/', $url);
            //retorna el arreglo url
            return $url;
        }
    }
}