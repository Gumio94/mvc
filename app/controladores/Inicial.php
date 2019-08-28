<?php
class Inicial extends Controlador{
    public function __construct() {
//        $this->usuarioModelo = $this->modelo('Usuario');
    }
    public function index(){
        
//        $usuarios = $this->usuarioModelo->obtenerUsuarios();
//        
//        $datos = [
//            'usuarios' => $usuarios
//        ];
        $datos = [];
        $this->vista('paginas/inicio',$datos);
    }
}