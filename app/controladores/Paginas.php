<?php
class Paginas extends Controler{
    public function __construct() {
        
    }
    public function index(){
        $this->vista('paginas/inicio');
    }
}