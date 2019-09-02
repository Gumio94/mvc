<?php
//controlador por defecto
class Inicial extends Controlador{
    
    public function __construct() {
        //aca se iniciarian los modelos de este controlador 
    }
    
    //metodo por defecto del controlador
    public function index(){
        //crea un arreglo y pone como dato lo que se va a mostrar en la vista 
        $datos = [
            'titulo' => 'NotiFalso'
        ];
        //inicia la vista 
        $this->vista('paginas/inicio',$datos);
    }
}