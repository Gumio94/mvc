<?php
/*Carga el modelo y las vistas*/
class Controlador{
    
    //cargar modelo 
    public function modelo($modelo){
        //trae el archivo con el modelo
        require_once '../app/modelos/'. $modelo . '.php';
        
        //retorna un objeto del modelo
        return new $modelo();
    }
    
    //cargar vista 
    public function vista($vista, $datos = []){
        //chequea si existe vista 
        if (file_exists('../app/vistas/'. $vista . '.php')){
            //trae la vista si existe
            require_once '../app/vistas/'. $vista . '.php';
        } else {
            //si el archivo de la vista no existe
            die('La vista no existe');
        }
    }
}