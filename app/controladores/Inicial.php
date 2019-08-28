<?php
class Inicial extends Controlador{
    public function __construct() {
        
    }
    public function index(){
        $datos = [];
        $this->vista('paginas/inicio',$datos);
    }
}