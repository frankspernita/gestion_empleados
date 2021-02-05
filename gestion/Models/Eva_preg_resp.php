<?php //namespace Models;
include_once 'Conexion.php';
	
	class Eva_preg_resp{
        private $ideva_preg_resp;
        private $idevaluacion;
        private $idpregunta;
        private $puntuacion;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarEva_preg_resp(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO eva_preg_resp(idevaluacion, idpregunta, puntuacion) VALUES ({$this->idevaluacion}, {$this->idpregunta}, {$this->puntuacion})";
            //$sql1 = "SELECT LAST_INSERT_ID() as idevaluacion";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateEva_preg_resp(){                            
            $con = new Conexion();
			$sql = "UPDATE eva_preg_resp SET idevaluacion = {$this->idevaluacion}, idpregunta = {$this->idpregunta}, puntuacion = {$this->puntuacion} WHERE ideva_preg_resp = {$this->ideva_preg_resp}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarEva_preg_resp(){                            
            $con = new Conexion();
			$sql = "DELETE FROM eva_preg_resp WHERE ideva_preg_resp = {$this->ideva_preg_resp}";
            $con->consultaSimple($sql);
        }
	}
?>