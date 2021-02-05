<?php //namespace Models;
include_once 'Conexion.php';
	
	class Local{
        private $idlocal;
        private $loc_nombre;
        private $loc_direccion;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarLocal(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO local(loc_nombre, loc_direccion) VALUES ('{$this->loc_nombre}', '{$this->loc_direccion}')";
            $con->consultaSimple($sql);
            // $datos = $con->consultaRetorno($sql);  // ?
            // return $datos;
        }
        
        
         public function buscarLocal(){
            $con = new Conexion();
            $sql = "SELECT * FROM local WHERE idlocal = {$this->idlocal}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
        
        public function updateLocal(){
            $con = new Conexion();
			$sql = "UPDATE local SET loc_nombre = '{$this->loc_nombre}', loc_direccion = '{$this->loc_direccion}' WHERE idlocal = {$this->idlocal}";
            $con->consultaSimple($sql);
        }
        
       
        
        public function eliminarLocal(){
            $con = new Conexion();
			$sql = "DELETE FROM local WHERE idlocal = {$this->idlocal}";
            $con->consultaSimple($sql);
        }
        
        public function verLocales(){
            $con = new Conexion();
			$sql = "SELECT * FROM local ORDER BY idlocal";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
        
        
	}
?>