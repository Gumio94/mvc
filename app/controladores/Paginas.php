<?php
class Paginas extends Controler{
    public function __construct() {
        
    }
    public function index(){
        
        $datos = [];
        $this->vista('paginas/inicio',$datos);
    }
}