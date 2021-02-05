<?php //namespace Models;
include_once 'Conexion.php';
	
	class Vencimiento{
        private $idvencimiento;
        private $vto_fecha;
        private $idlocal_prod;
        private $vto_lote;
        
		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarVencimiento(){           
            $con = new Conexion();
			$sql = "INSERT INTO vencimiento(vto_fecha, idlocal_prod, vto_lote) VALUES ('{$this->vto_fecha}', {$this->idlocal_prod}, {$this->vto_lote})";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateVencimiento(){                            
            $con = new Conexion();
			$sql = "UPDATE vencimiento SET vto_fecha = '{$this->vto_fecha}', idlocal_prod = {$this->idlocal_prod}, vto_lote = {$this->vto_lote} WHERE idvencimiento = {$this->idvencimiento}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarVencimiento(){                            
            $con = new Conexion();
			$sql = "DELETE FROM vencimiento WHERE idlocal_prod = {$this->idlocal_prod}";
            $con->consultaSimple($sql);
        }

        public function verVencimientos(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM vencimiento, local_prod WHERE vencimiento.idlocal_prod = local_prod.idlocal_prod AND local_prod.idproducto = {$this->idproducto}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>