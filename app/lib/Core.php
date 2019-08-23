<?php

class Core{
    protected $controlador_actual = "pag";
    protected $metodo_actual="index";
    protected $parametro=[];
    
    public function __construct() {
        print_r($this->getUrl());
        //$url = $this->getUrl();
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