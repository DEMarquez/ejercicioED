<?php

class DataBase {
	private $conexion;

	private function conectar() {
		$this->conexion = mysqli_connect("localhost", "root", "root", "pelisOnline") or die("Error al conectar");
		mysqli_set_charset($this->conexion, "utf8");
	}

	private function consulta($sql) {
		$this->conectar();
		$resultado=mysqli_query($this->conexion, $sql);
		return $resultado;
	}

	public function insertarUsuario($nombre, $apellido, $dni, $saldo){

		$this->conectar();

		$sql = "INSERT INTO usuarios VALUES ('$nombre','$apellido','$dni', $saldo)";
 
		if($query=$this->consulta($sql)) {
			$this->desconectar();
			return true;
		}
		else {
			$this->desconectar();
			return false;
		}
	}


	public function insertarPeliculas($titulo, $director, $duracion, $genero){

		$this->conectar();

		$sql = "INSERT INTO peliculas VALUES ('$titulo','$director','$duracion','$genero')";

		if($query=$this->consulta($sql)) {
			$this->desconectar();
			return true;
		}
		else {
			$this->desconectar();
			return false;
		}
	}

	public function insertarAlquiler($tituloPelicula, $dniUsuario){

		$this->conectar();

		$sql = "INSERT INTO alquiler VALUES ('$tituloPelicula', '$dniUsuario')";

		if($query=$this->consulta($sql)) {
			$this->desconectar();
			return true;
		}
		else {
			$this->desconectar();
			return false;
		}
	}

	public function selectDatos($nDni){
	
		$this->conectar();
		$query="SELECT dniUsuario FROM alquiler a, usuarios u WHERE a.dniUsuario=u.dni";
		$resultado=$this->consulta($sql);
		$fila=mysqli_fetch_assoc($resultado);
		return $fila;
	}

	public function actualizarSaldo($nSaldo){

		$this->conectar();
		$nSaldo=4;
		$sql="UPDATE usuarios SET saldo=saldo-'$nSaldo' WHERE dni=$this->selectDatos()";

		if($query=$this->consulta($sql)) {
			$this->desconectar();
			return true;
		}
		else {
			$this->desconectar();
			return false;
		}
	}

	public function desconectar() {
		mysqli_close($this->conexion);
	}
}			

?>