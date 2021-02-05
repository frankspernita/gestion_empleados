<?php //namespace Models;
include_once 'Conexion.php';
	
	class Respuesta{
        private $idrespuesta;
        private $resp_nombre;
        private $resp_valoracion;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarRespuesta(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO respuesta(resp_nombre, resp_valoracion) VALUES ('{$this->resp_nombre}', {$this->resp_valoracion})";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateRespuesta(){                            
            $con = new Conexion();
			$sql = "UPDATE respuesta SET resp_nombre = '{$this->resp_nombre}', resp_valoracion = {$this->resp_valoracion} WHERE idrespuesta = {$this->idrespuesta}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarRespuesta(){                            
            $con = new Conexion();
			$sql = "DELETE FROM respuesta WHERE idrespuesta = {$this->idrespuesta}";
            $con->consultaSimple($sql);
        }
	}
?>