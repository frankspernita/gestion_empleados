<?php //namespace Controllers;

//use Models\Formulario as Formulario;
define('__ROOT__',dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Models/Formulario.php');

	class principalController{            
            
        private $formulario;

        public function __construct() {
            $this->formulario = new Formulario();
        }


        public function inicio(){
            if(!$_POST){
                if($_SESSION['idperfil'] == 1){
                    $_SESSION['localactual'] = 0;
                }
                $this->formulario->set('for_fecha', date('Y-m-d'));
                if($_SESSION['localactual'] == 0){
                    $datos = $this->formulario->verFormulariosSupervisor();   
                }else{
                    $datos = $this->formulario->verFormulariosAuditor();
                }
                return $datos;
            }
		}
	}
$principal = new principalController();        
?>