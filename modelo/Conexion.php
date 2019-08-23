<?php
class Conexion{
	
	private $con;
		
	private function abrirConexion(){
		$this->con = new mysqli("localhost","root","","notifalso");
		if($this->con->connect_errno){
			echo "Fallo conexion: ".$this->con->connect_error."<br>";
			exit;
		}
		
		if(!$this->con->query("SET CHARACTER SET UTF8")){
			echo "Error en la consulta: ".$this->con->error."<br>";
		}
	}
	
	private function cerrarConexion(){
		$this->con->close();
	}
	
	public function consultaSimple($sql){
		$this->abirConexion();
		if(!$this->con->query($sql)){
			echo "Error en la consulta: ".$this->con->error."<br>";
			echo "SQL ejecutado: ".$sql."<br>";
		}
		$this->cerrarConexion();
	}
	
	public function resultadoDeConsulta($sql){
		$fila = array();
		$this->abirConexion();
		if(!$resultado = $this->con->query($sql)){
			echo "Error en la consulta: ".$this->con->error."<br>";
			echo "SQL ejecutado: ".$sql."<br>";
			$this->cerrarConexion();
			exit;
		}
		while($fila[]=$resultado->fetch_assoc());
		$resultado->close();
		$this->cerrarConexion();
		
		array_pop($fila);
	}
}
?>