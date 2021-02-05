<?php //namespace Models;
include_once 'Conexion.php';
	
	class Calc_stock{
        private $idcalc_stock;
        private $calc_nombre;
        private $calc_fecha;
        private $calc_hora;
        private $idusuario;
        private $idlocal;
        
		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarCalc_stock(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO calc_stock(calc_nombre, calc_fecha, calc_hora, idusuario, idlocal) VALUES ('{$this->calc_nombre}', '{$this->calc_fecha}', '{$this->calc_hora}', {$this->idusuario}, {$this->idlocal})";
            //$sql1 = "SELECT LAST_INSERT_ID() as idusuario";
            //echo $sql;
            $con->consultaSimple($sql);
            //$datos = $con->consultaRetorno($sql1);
            //return $datos;
        }
        
        public function updateCalc_stock(){                            
            $con = new Conexion();
			$sql = "UPDATE calc_stock SET calc_nombre = '{$this->calc_nombre}', calc_fecha = '{$this->calc_fecha}', calc_hora = '{$this->calc_hora}', idusuario = {$this->idusuario}, idlocal = {$this->idlocal}  WHERE idcalc_stock = {$this->idcalc_stock}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarCalc_stock(){                            
            $con = new Conexion();
			$sql = "DELETE FROM calc_stock WHERE idcalc_stock = {$this->idcalc_stock}";
            $con->consultaSimple($sql);
        }
	}
?>