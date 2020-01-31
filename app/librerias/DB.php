<?php
/*
Archivo de conexion comun a todos los modelos
*/
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
        //arreglo donde se aclara las caracteristicas de la conexion
        $opciones = array(
            PDO::ATTR_PERSISTENT => TRUE,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        //intenta crear un objeto PDO (Objeto de datos PHP osea la conexion)
        try {
            //utiliza los datos para abrir la conexion
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $opciones);
            //setea los caracteres en español
            $this->dbh->exec('SET NAMES utf8');
        
        //en caso de que no pueda 
        } catch (PDOException $ex) {
            //informa el error
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }
    
    /** prepara la consulta antes de ejecutarla
     * @param String $sql Consulta a ejecutar
     */
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    /** prepara los parametros antes de ejecutar la consulta
     * 
     * @param string $parametro Nombre del valor a remplazar
     * @param all $valor Valor del parametro
     * @param PDO::PARAM $tipo Tipo de parametro. Sino se especifica, se pone automaticamente
     */
    public function bind($parametro, $valor, $tipo = null){
        //en el caso de que no llegue de que tipo de parametro es, setea en base a el valor
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
        //coloca el nombre del parametro, el valor y tipo
        $this->stmt->bindValue($parametro,$valor,$tipo);
    }
    
    //ejecuta la consulta
    public function execute(){
        return $this->stmt->execute();
    }
    
    //obtiene todos los registros de la consulta
    public function registros(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    //obtiene un solo registro de la consulta
    public function registro(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    
    //obtiene el numero de filas de la consulta
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
}