<?php //namespace Models;
include_once 'Conexion.php';
	
	class Item_local{
        
        private $idItem_local;
        private $iditem;
        private $idlocal;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarItem_local(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO item_local(iditem, idlocal) VALUES ({$this->iditem}, {$this->idlocal})";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateLocal(){                            
            $con = new Conexion();
			$sql = "UPDATE item_local SET iditem = {$this->iditem}, idlocal = {$this->idlocal} WHERE iditem_local = {$this->iditem}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarItem_local(){                            
            $con = new Conexion();
			$sql = "DELETE FROM item_local WHERE iditem = {$this->iditem}";
            $con->consultaSimple($sql);
        }
        
        public function verItem_Local(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM item_local ORDER BY iditem_local";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>