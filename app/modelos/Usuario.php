<?php
class Usuario {
    private $db;
    
    public function __construct() {
        $this->db = new DB;
    }
    
    public function obtenerUsuarios(){
        $this->db->query("SELECT * FROM Usuario");
        
        return $this->db->registros();
    }
}
