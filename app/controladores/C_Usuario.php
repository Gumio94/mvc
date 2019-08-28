<?php
class C_Usuario extends Controlador{
    public function __construct() {
        $this->usuarioModelo = $this->modelo('Usuario');
    }
    public function index(){
        
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        
        $datos = [
            'usuarios' => $usuarios
        ];
        $this->vista('paginas/verUsuarios',$datos);
    }
}
