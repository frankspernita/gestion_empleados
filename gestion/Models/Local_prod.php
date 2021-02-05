<?php //namespace Models;
include_once 'Conexion.php';
	
	class Local_prod{
        private $idlocal_prod;
        private $idproducto;
        private $idlocal;
        private $prod_stockactual;
        private $prod_stockrecibir;
        private $idproveedor;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarLocal_prod(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO local_prod(idproducto, idlocal, prod_stockactual, prod_stockrecibir, idproveedor) VALUES ({$this->idproducto}, {$this->idlocal}, {$this->prod_stockactual}, {$this->prod_stockrecibir}, {$this->idproveedor})";
            $sql1 = "SELECT LAST_INSERT_ID() as idlocal_prod";
            $con->consultaSimple($sql);
            $datos = $con->consultaRetorno($sql1);
            return $datos;
        }
        
        public function updateLocal_prod(){                            
            $con = new Conexion();
			$sql = "UPDATE local_prod SET idproducto = {$this->idproducto}, prod_stockactual = {$this->prod_stockactual}, prod_stockrecibir = {$this->prod_stockrecibir}, idproveedor = {$this->idproveedor} WHERE idlocal_prod = {$this->idlocal_prod}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarLocal_prod(){                            
            $con = new Conexion();
			$sql = "DELETE FROM local_prod WHERE idlocal_prod = {$this->idlocal_prod}";
            $con->consultaSimple($sql);
        }

        public function updateStock(){
            $con = new Conexion();
            $sql = "UPDATE local_prod SET prod_stockactual = {$this->prod_stockactual}, prod_stockrecibir = {$this->prod_stockrecibir} WHERE idproducto = {$this->idproducto}";
            $con->consultaSimple($sql);
        }
	}
?>