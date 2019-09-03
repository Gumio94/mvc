<?php
//controlador por defecto
class Inicial extends Controlador{
    
    public function __construct() {
        //aca se iniciarian los modelos de este controlador 
        $this->noticia_modelo = $this->modelo('NoticiaModelo');
    }
    
    //metodo por defecto del controlador
    public function index(){
        //crea un arreglo y pone como dato lo que se va a mostrar en la vista 
        $noticias = $this->noticia_modelo->traerParte(0,15);
        $datos = [
            'titulo' => 'NotiFalso',
            'noticias' => $noticias
        ];
        //inicia la vista 
        $this->vista('paginas/inicio',$datos);
    }
}