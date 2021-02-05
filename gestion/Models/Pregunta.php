<?php //namespace Models;
include_once 'Conexion.php';
	
	class Pregunta{
        private $idpregunta;
        private $preg_descripcion;
        
		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarPregunta(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO pregunta (idpregunta, preg_descripcion) VALUES ({$this->idpregunta}, '{$this->preg_descripcion}')";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updatePregunta(){                            
            $con = new Conexion();
			$sql = "UPDATE pregunta SET preg_descripcion = '{$this->preg_descripcion}' WHERE idpregunta = {$this->idpregunta}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarPregunta(){                            
            $con = new Conexion();
			$sql = "DELETE FROM pregunta WHERE idpregunta = {$this->idpregunta}";
            $con->consultaSimple($sql);
        }

        public function armarEvaluacion(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM pregunta ORDER BY idpregunta ASC";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function ultimaPregunta(){                            
            $con = new Conexion();
			$sql = "SELECT MAX(idpregunta) as idpregunta FROM pregunta";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function verPreguntas(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM pregunta ORDER BY idpregunta";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function buscarPregunta(){                            
            $con = new Conexion();
            $sql = "SELECT * FROM pregunta WHERE idpregunta = {$this->idpregunta}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>