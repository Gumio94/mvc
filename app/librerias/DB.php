<?php

class DB{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name_db = DB_NAME;
    
    private $dbh; //database handler: es el objeto que tiene nuestra conexion
    private $stmt; //statement: el que ejecuta las consultas
    private $error; //almacena los errores de conexion o consulta
    
    public function __construct() {
        //configura conexion
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->name_db;
        $opciones = array(
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        //crea un objeto PDO
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $opciones);
            $this->dbh->exec('set name utf8');
        } catch (PDOException $ex) {
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }
    
    //prepara la consulta antes de ejecutarla
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    //prepara los parametros antes de ejecutar la consulta
    public function bind($parametro, $valor, $tipo = null){
        if(is_null($tipo)){
            switch (TRUE){
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default :
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($parametro,$valor,$tipo);
    }
    
    //ejecuta la consulta
    public function execute(){
        return $this->stmt->execute();
    }
    
    //obtiene todos los registros
    public function registros(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    //obtiene un solo registro
    public function registro(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    
    //numero de filas 
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
    
    
}