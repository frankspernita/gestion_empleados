<?php //namespace Models;
include_once 'Conexion.php';
	
	class Form_item_resp{
        private $idform_item_resp;
        private $idformulario;
        private $iditem;
        private $idrespuesta;
        //solo para hacer el filtrado, no pertenecen a la tabla
        private $idlocal;
        private $idcatecoria;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarForm_item_resp(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO form_item_resp(idformulario, iditem, idrespuesta) VALUES ({$this->idformulario}, {$this->iditem}, {$this->idrespuesta})";
            //$sql1 = "SELECT LAST_INSERT_ID() as idformulario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateForm_item_resp(){                            
            $con = new Conexion();
			$sql = "UPDATE form_item_resp SET idformulario = {$this->idformulario}, iditem = {$this->iditem}, idrespuesta = {$this->idrespuesta} WHERE idform_item_resp = {$this->idform_item_resp}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarForm_item_resp(){                            
            $con = new Conexion();
			$sql = "DELETE FROM form_item_resp WHERE idform_item_resp = {$this->idform_item_resp}";
            $con->consultaSimple($sql);
        }

        public function armarFormulario(){
            $con = new Conexion();
            $sql = "SELECT c.cat_nombre as cat_nombre, i.iditem as iditem, i.it_nombre as it_nombre, i.it_descripcion as it_descripcion
                    FROM item as i
                    INNER JOIN categoria AS c ON i.idcategoria = c.idcategoria
                    WHERE c.idcategoria = {$this->idcategoria}
                    AND NOT EXISTS (
                    	SELECT il.iditem_local 
                        FROM item_local as il
                        WHERE il.iditem = i.iditem AND il.idlocal = {$this->idlocal}
                    )
                    ORDER BY i.iditem ASC";
// 			$sql = "SELECT categoria.cat_nombre, item.iditem, item.it_nombre, item.it_descripcion 
//                     FROM item
//                     INNER JOIN categoria ON item.idcategoria = categoria.idcategoria
//                     LEFT JOIN item_local ON item.iditem NOT IN (SELECT item_local.iditem FROM item_local, item WHERE item.iditem = item_local.idlocal AND item_local.idlocal = {$this->idlocal})
//                     WHERE categoria.idcategoria = {$this->idcategoria} AND item_local.idlocal = {$this->idlocal} GROUP BY item.iditem ORDER BY item.iditem ASC";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>