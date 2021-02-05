<?php //namespace Models;
include_once 'Conexion.php';
	
	class Form_cat{
        private $idform_cat;
        private $idformulario;
        private $idcategoria;
        private $for_archivo;
        private $for_observacion;

		public function __construct(){
			
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}

		public function get($atributo){
			return $this->$atributo;
		}

		public function agregarForm_cat(){
                            
            $con = new Conexion();
			$sql = "INSERT INTO form_cat(idformulario, idcategoria, for_archivo, for_observacion) VALUES ({$this->idformulario}, {$this->idcategoria}, '{$this->for_archivo}', '{$this->for_observacion}')";
            $con->consultaSimple($sql);
        }
        
        public function updateForm_cat(){                            
            $con = new Conexion();
			$sql = "UPDATE form_cat SET idformulario = {$this->idformulario}, idcategoria = {$this->idcategoria}, for_archivo = '{$this->for_archivo}', for_observacion = '{$this->for_observacion}' WHERE idform_cat = {$this->idform_cat}";
            $con->consultaSimple($sql);
        }
        
        public function eliminarForm_cat(){                            
            $con = new Conexion();
			$sql = "DELETE FROM form_cat WHERE idform_cat = {$this->idform_cat}";
            $con->consultaSimple($sql);
        }
	}
?>