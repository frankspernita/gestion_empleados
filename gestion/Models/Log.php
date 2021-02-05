<?php //namespace Models;
include 'Conexion.php';
	class Log{
            private $us_name;
			private $us_password;
			private $us_estado;
			private $us_codseg;


		public function __construct(){

		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}
                
        public function verLog(){
            $con = new Conexion();
			$sql = "SELECT * FROM usuario WHERE us_name LIKE '{$this->us_name}' AND us_password = '{$this->us_password}'";
            $datos = $con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}	
		
		public function buscarUser(){
            $con = new Conexion();
			$sql = "SELECT * FROM usuario WHERE us_name = '{$this->us_name}'";
            $datos = $con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

		public function validarCuenta(){
            $con = new Conexion();
			$sql = "UPDATE usuario SET us_estado = 1 WHERE us_codseg = {$this->us_codseg}";
            $con->consultaSimple($sql);
		}

		public function bloquear(){
            $con = new Conexion();
			$sql = "UPDATE usuario SET us_estado = 0, us_codseg = {$this->us_codseg} WHERE us_mail = '{$this->us_mail}'";
            $con->consultaSimple($sql);
		}

		public function cambiarPass(){
            $con = new Conexion();
			$sql = "UPDATE usuario SET us_password = '{$this->us_password}' WHERE us_codseg = {$this->us_codseg}";
            $con->consultaSimple($sql);
		}
	}
?>