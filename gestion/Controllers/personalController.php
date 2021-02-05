<?php //namespace Controllers;

//use Models\Empleado as Empleado;
//use Models\Pregunta as Pregunta;
//use Models\Evaluacion as Evaluacion;
//use Models\Eva_preg_resp as Eva_preg_resp;
define('__ROOT__',dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Models/Empleado.php');
require_once(__ROOT__.'/Models/Pregunta.php');
require_once(__ROOT__.'/Models/Evaluacion.php');
require_once(__ROOT__.'/Models/Eva_preg_resp.php');

	class personalController{            
            
        private $empleado;
        private $pregunta;
        private $evaluacion;
        private $eva_preg_resp;

        public function __construct() {
            $this->empleado = new Empleado();
            $this->pregunta = new Pregunta();
            $this->evaluacion = new Evaluacion();
            $this->eva_preg_resp = new Eva_preg_resp();
        }


        public function ver(){
            if(!$_POST){
                
            }else{
                $this->empleado->set('emp_nombre', $_POST['empleado']);
                $datos = $this->empleado->buscarEmpleado();
                return $datos;
            }
        }
        
        public function evaluar($idempleado){
            if(!$_POST){
                $datos = $this->pregunta->armarEvaluacion();
                return $datos;   
            }else{
                date_default_timezone_set('America/Buenos_Aires');
                $this->evaluacion->set('ev_fecha',date('Y-m-d'));
                $this->evaluacion->set('ev_hora',date('H:i:s'));
                $this->evaluacion->set('idusuario',$_SESSION['idusuario']);
                $this->evaluacion->set('idempleado',$idempleado);
                $this->evaluacion->set('ev_descripcion',$_POST['ev_descripcion']);
                $datos = $this->evaluacion->agregarEvaluacion();
                $row = mysqli_fetch_array($datos);
                session_start;
                $_SESSION['idevaluacion'] = $row['idevaluacion'];
                for($i=1;$i<=$_POST['filas'];$i++){
                    $this->eva_preg_resp->set('idevaluacion',$row['idevaluacion']);
                    $this->eva_preg_resp->set('idpregunta',$_POST['idpregunta'.$i]);
                    $this->eva_preg_resp->set('puntuacion',$_POST['puntuacion'.$i]);
                    $this->eva_preg_resp->agregarEva_preg_resp();
                }
                //header("Location: ". URL ."personal/resultado");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'personal/resultado");
                                </script>';
                                exit();
            }
        }
        
        public function resultado(){
            if(!POST){
                
            }else{
                $this->evaluacion->set('idevaluacion', $_SESSION['idevaluacion']);
                $datos = $this->evaluacion->promedioEvaluacion();
                return $datos;
            }
        }

        public function evaluaciones(){
            if(!$_POST){
                $this->evaluacion->set('ev_fecha', date('Y-m-d'));
                $datos = $this->evaluacion->verEvaluaciones();
                return $datos;
            }
		}
		
		public function eliminar($idevaluacion){
            $this->evaluacion->set('idevaluacion',$idevaluacion);
            $this->evaluacion->eliminarEvaluacion();
            echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'personal/evaluaciones");
                                </script>';
                                exit();
        }
	}
$personal = new personalController();        
?>