<?php
require_once("Conexion.php");

class UsuarioModelo{
	private $bd;
	
	function __construct(){
		$this->bd = new Conexion();
	}
	
	public function getAll(){
		$x = $this->bd->resultadoDeConsulta("SELECT * FROM usuario");
		array_pop($x);
	}
	
	public function getUsuario($usua,){
		
	} 
}
?>
