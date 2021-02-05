<?php //namespace Models;
include_once 'Conexion.php';
	
	class Item{
        private $iditem;
        private $idcategoria;
        private $it_nombre;
        private $it_descripcion;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarItem(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO item(idcategoria, it_nombre, it_descripcion) VALUES ({$this->idcategoria}, '{$this->it_nombre}', '{$this->it_descripcion}')";
			$con->consultaSimple($sql);
			$sql1 = "SELECT LAST_INSERT_ID() as iditem";
            $datos = $con->consultaRetorno($sql1);
            return $datos;
        }
        
        public function updateItem(){                            
            $con = new Conexion();
			$sql = "UPDATE item SET idcategoria = {$this->idcategoria}, it_nombre = '{$this->it_nombre}', it_descripcion = '{$this->it_descripcion}' WHERE iditem = {$this->iditem}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarItem(){                            
            $con = new Conexion();
			$sql = "DELETE FROM item WHERE iditem = {$this->iditem}";
            $con->consultaSimple($sql);
        }

        public function buscarItem(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM item LEFT JOIN item_local ON item.iditem = item_local.iditem WHERE item.iditem = {$this->iditem}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
        
        public function buscarItems(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM item, categoria WHERE categoria.idcategoria = item.idcategoria AND categoria.idcategoria = {$this->idcategoria}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>