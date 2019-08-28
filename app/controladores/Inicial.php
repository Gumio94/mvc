<?php
class Inicial extends Controlador{
    public function __construct() {
    }
    public function index(){
        
        $datos = [
            'titulo' => 'Bienvenido a MVC'
        ];
        $this->vista('paginas/inicio',$datos);
    }
}