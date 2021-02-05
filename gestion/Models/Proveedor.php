<?php //namespace Models;
include_once 'Conexion.php';
	
	class Proveedor{
        private $idproveedor;
        private $prov_nombre;
        
		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarProveedor(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO proveedor(prov_nombre) VALUES ('{$this->prov_nombre}')";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateProveedor(){                            
            $con = new Conexion();
			$sql = "UPDATE proveedor SET prov_nombre = '{$this->prov_nombre}' WHERE idproveedor = {$this->idproveedor}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarProveedor(){                            
            $con = new Conexion();
			$sql = "DELETE FROM proveedor WHERE idproveedor = {$this->idproveedor}";
            $con->consultaSimple($sql);
        }

        public function verProveedores(){
            $con = new Conexion();
			$sql = "SELECT * FROM proveedor ORDER BY idproveedor ASC";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function verProveedor(){
            $con = new Conexion();
            $sql = "SELECT * FROM proveedor WHERE idproveedor = {$this->idproveedor}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>