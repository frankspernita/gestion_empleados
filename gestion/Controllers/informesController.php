<?php //namespace Controllers;

//use Models\Formulario as Formulario;
define('__ROOT__',dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Models/Formulario.php');
require_once(__ROOT__.'/Models/Evaluacion.php');

	class informesController{            
            
        private $formulario;
        private $evaluacion;

        public function __construct() {
            $this->formulario = new Formulario();
            $this->evaluacion = new Evaluacion();
        }


        public function por_auditoria($idformulario){
            if(!$_POST){
                $this->formulario->set('idformulario',$idformulario);
                $datos = $this->formulario->informeFormulario();
                return $datos;
            }
		}
		
		public function multimedia($idformulario){
            if(!$_POST){
                $this->formulario->set('idformulario',$idformulario);
                $datos = $this->formulario->verMultimedia();
                return $datos;
            }
		}
		
		public function form_terminado($idformulario){
            if(!$_POST){
                $this->formulario->set('idformulario',$idformulario);
                $datos = $this->formulario->verRespuestaItem();
                return $datos;
            }
		}
		
		public function eva_terminada($idevaluacion){
            if(!$_POST){
                $this->evaluacion->set('idevaluacion',$idevaluacion);
                $datos = $this->evaluacion->verPuntuacionPregunta();
                return $datos;
            }
        }
        
        public function por_evaluacion($idevaluacion){
            if(!$_POST){
                $this->evaluacion->set('idevaluacion',$idevaluacion);
                $datos = $this->evaluacion->porcentajeEvaluacion();
                return $datos;
            }
        }
	}
$informes = new informesController();        
?>