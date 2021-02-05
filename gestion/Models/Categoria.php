<?php //namespace Models;
include_once 'Conexion.php';
	
	class Categoria{
        private $idcategoria;
        private $cat_nombre;
        
		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarCategoria(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO categoria(cat_nombre) VALUES ('{$this->cat_nombre}')";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateCategoria(){                            
            $con = new Conexion();
			$sql = "UPDATE categoria SET cat_nombre = '{$this->cat_nombre}' WHERE idcategoria = {$this->idcategoria}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarCategoria(){                            
            $con = new Conexion();
			$sql = "DELETE FROM categoria WHERE idcategoria = {$this->idcategoria}";
            $con->consultaSimple($sql);
        }
        
        public function verCategorias(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM categoria ORDER BY idcategoria";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>