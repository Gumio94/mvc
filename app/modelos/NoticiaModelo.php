<?php
class NoticiaModelo{
    private $db;
    
    public function __construct() {
        $this->db = new DB();
    }
    
    /**
     * Trae una parte de todas las noticias
     * @param int $desde : desde donde se quiere mostrar
     * @param int $limite : cantidad a mostrar
     */
    public function traerParte($desde,$limite){
        $this->db->query("SELECT * FROM noticia LIMIT :limite OFFSET :desde");
        $this->db->bind(':limite', $limite);
        $this->db->bind(':desde', $desde);
        return $this->db->registros();
    }

} 
