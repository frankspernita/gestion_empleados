<?php //namespace Models;
include_once 'Conexion.php';
	
	class Empleado{
        private $idempleado;
        private $emp_apellido;
        private $emp_nombre;
        private $emp_dni;
        private $emp_celular;
        private $emp_domicilio;
        private $emp_legajo;
        private $idlocal;
        private $idpuesto;
        
		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarEmpleado(){
            $this->idlocal = !empty($this->idlocal) ? $this->idlocal : "NULL";
            $this->emp_dni = !empty($this->emp_dni) ? $this->emp_dni : "NULL";
            //$this->idpuesto = !empty($this->idpuesto) ? $this->idpuesto : "NULL";
            $this->emp_celular = !empty($this->emp_celular) ? $this->emp_celular : "NULL";
            $this->emp_legajo = !empty($this->emp_legajo) ? $this->emp_legajo : "NULL";               
            $con = new Conexion();
			$sql = "INSERT INTO empleado(emp_apellido, emp_nombre, emp_dni, emp_celular, emp_domicilio, emp_legajo, idlocal, idpuesto) VALUES ('{$this->emp_apellido}', '{$this->emp_nombre}', {$this->emp_dni}, {$this->emp_celular}, '{$this->emp_domicilio}', {$this->emp_legajo}, {$this->idlocal}, '{$this->idpuesto}')";
            $con->consultaSimple($sql);
        }
        
        public function updateEmpleado(){
            $this->idlocal = !empty($this->idlocal) ? $this->idlocal : "NULL";
            $this->emp_dni = !empty($this->emp_dni) ? $this->emp_dni : "NULL";
            //$this->idpuesto = !empty($this->idpuesto) ? $this->idpuesto : "NULL";
            $this->emp_celular = !empty($this->emp_celular) ? $this->emp_celular : "NULL";
            $this->emp_legajo = !empty($this->emp_legajo) ? $this->emp_legajo : "NULL";                              
            $con = new Conexion();
			$sql = "UPDATE empleado SET emp_apellido = '{$this->emp_apellido}', emp_nombre = '{$this->emp_nombre}', emp_domicilio = '{$this->emp_apellido}', emp_dni = {$this->emp_dni}, emp_celular = {$this->emp_celular}, emp_legajo = {$this->emp_legajo}, idlocal = {$this->idlocal}, idpuesto = '{$this->idpuesto}' WHERE idempleado = {$this->idempleado}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarEmpleado(){                            
            $con = new Conexion();
			$sql = "DELETE FROM empleado WHERE idempleado = {$this->idempleado}";
            $con->consultaSimple($sql);
        }

        public function buscarEmpleado(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM empleado WHERE emp_apellido LIKE '%{$this->emp_nombre}%' OR emp_nombre LIKE '%{$this->emp_nombre}%' ORDER BY emp_apellido, emp_nombre ASC";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }

        public function buscaEmpleado(){                            
            $con = new Conexion();
			$sql = "SELECT * FROM empleado WHERE idempleado = {$this->idempleado}";
            $datos = $con->consultaRetorno($sql);
            return $datos;
        }
	}
?>