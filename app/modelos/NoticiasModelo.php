<?php
class NoticiasModelo{
    private $db;
    
    public function __construct() {
        $this->db = new DB();
    }
    
    /**
     * Trae una parte de todas las noticias
     * @param int $desde 
     * @param int $limite
     */
    public function traerParte($desde,$limite){
        $this->db->query("");
    }

} 
