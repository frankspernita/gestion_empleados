<?php //namespace Controllers;

//use Models\Formulario as Formulario;
define('__ROOT__',dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Models/Formulario.php');
require_once(__ROOT__.'/Models/Item.php');
require_once(__ROOT__.'/Models/Pregunta.php');
require_once(__ROOT__.'/Models/Empleado.php');
require_once(__ROOT__.'/Models/Evaluacion.php');
require_once(__ROOT__.'/Models/Local.php');
require_once(__ROOT__.'/Models/Item_local.php');
require_once(__ROOT__.'/Models/Usuario.php');


	class controlController{            
            
        private $formulario;
        private $item;
        private $pregunta;
        private $empleado;
        private $evaluacion;
        private $local;
        private $item_local;
        private $usuario;

        public function __construct() {
            $this->formulario = new Formulario();
            $this->item = new Item();
            $this->pregunta = new Pregunta();
            $this->empleado = new Empleado();
            $this->evaluacion = new Evaluacion();
            $this->local = new Local();
            $this->item_local = new Item_local();
            $this->usuario = new Usuario();
        }


        public function auditorias(){
            if(!$_POST){
                
            }else{
                $this->formulario->set('for_fecha',$_POST['for_fecha']);
                $datos = $this->formulario->formularioPorFecha();
                return $datos;
            }
		}
		
		/*public function Print_RR($Var){
            print_r($Var);
            return ("asd");
		}*/
		
		//#############################################################################//
		
		public function agregar_local(){
            
            if(!$_POST){

            }else{
                $this->local->set('loc_nombre',$_POST['loc_nombre']);
                $this->local->set('loc_direccion',$_POST['loc_direccion']);
                $this->local->agregarLocal();
                //header("Location: ". URL ."principal/inicio/");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL. 'control/ver_locales");
                                </script>';
                                exit();
            }

		}
		
		public function ver_locales(){
            if(!$_POST){
                
                $datos = $this->local->verLocales();
                return $datos;

            }else{
                
            }
        }
        
        
        public function editar_local($idlocal){
            if(!$_POST){
                $this->local->set('idlocal',$idlocal);
                $datos = $this->local->buscarLocal();
                return $datos;
            }else{
                $this->local->set('idlocal',$idlocal);
                $this->local->set('loc_nombre',$_POST['loc_nombre']);
                $this->local->set('loc_direccion',$_POST['loc_direccion']);
                $this->local->updateLocal();
                //header("Location: ". URL ."control/ver_preguntas");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL. 'control/ver_locales");
                                </script>';
                                exit();
            }
        }
        
        
        public function eliminar_local($idlocal){
            $this->local->set('idlocal',$idlocal);
            $this->local->eliminarLocal();
            //$this->local_local->set('$idlocal',$idlocal);
            //$this->item_local->eliminarItem_local();
            echo '<script type="text/javascript">
                                    window.location.assign("'.URL. 'control/ver_locales");
                                </script>';
                                exit();
        }
        
        
        //#############################################################################//
        
        public function agregar_usuario(){
            
            if(!$_POST){

				$datos = $this->usuario->altaUsuario();
				return $datos;

            }else{
                $this->usuario->set('us_name',$_POST['us_name']);
                $this->usuario->set('us_password',$_POST['us_password']);
                $this->usuario->set('us_nombre',$_POST['us_nombre']);
                $this->usuario->set('us_apellido',$_POST['us_apellido']);
                $this->usuario->set('idperfil',$_POST['idperfil']);
                $this->usuario->set('us_estado',$_POST['us_estado']);
                $this->usuario->set('idlocal',$_POST['idlocal']);
                $this->usuario->set('us_mail',$_POST['us_mail']);
                $this->usuario->agregarUsuario();
                //header("Location: ". URL ."principal/inicio/");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL. 'control/ver_Usuario/");
                                </script>';
                                exit();
            }

		}
		
		public function ver_usuario(){
            if(!$_POST){
                
                $datos = $this->usuario->verUsuarios();
                return $datos;

            }else{
                
            }
        }

		public function editar_usuario($idusuario)
		{
			if (!$_POST) {
				$this->usuario->set('idusuario', $idusuario);
				$datos = $this->usuario->buscarUsuario();
				return $datos;
			} else {
				$this->usuario->set('idusuario', $idusuario);
				$this->usuario->set('us_name', $_POST['us_name']);
				$this->usuario->set('us_password', $_POST['us_password']);
				$this->usuario->set('us_nombre', $_POST['us_nombre']);
				$this->usuario->set('us_apellido', $_POST['us_apellido']);
				$this->usuario->set('idperfil', $_POST['idperfil']);
				$this->usuario->set('us_estado', $_POST['us_estado']);
				$this->usuario->set('idlocal', $_POST['idlocal']);
				$this->usuario->set('us_mail', $_POST['us_mail']);
				$this->usuario->updateUsuario();
				//header("Location: ". URL ."control/ver_preguntas");
				echo '<script type="text/javascript">
										window.location.assign("' . URL . 'control/ver_usuario");
									</script>';
				exit();
			}
		}
		
		public function eliminar_usuario($idusuario)
		{
		    // logs('controlController.php', 'ELIMINAR Usuario ' . $idusuario . ' ...');
			$this->usuario->set('idusuario', $idusuario);
			$this->usuario->eliminarUsuario();
			//$this->local_local->set('$idlocal',$idlocal);
			//$this->item_local->eliminarItem_local();
			echo '<script type="text/javascript">
										window.location.assign("' . URL . 'control/ver_Usuario/");
									</script>';
			// logs('controlController.php', 'ELIMINAR ok');
			exit();
		}
        
        
        
        //#############################################################################//
		
		public function por_fechas(){
            if(!$_POST){
                
            }else{
                $this->formulario->set('fecha1',$_POST['fecha1']);
                $this->formulario->set('fecha2',$_POST['fecha2']);
                $this->formulario->set('idlocal',$_POST['idlocal']);
                $datos = $this->formulario->promedioPorFechas();
                return $datos;
            }
		}
		
		public function por_fechas_personal(){
            if(!$_POST){
                
            }else{
                $this->evaluacion->set('fecha1',$_POST['fecha1']);
                $this->evaluacion->set('fecha2',$_POST['fecha2']);
                $this->evaluacion->set('idempleado',$_POST['idempleado']);
                $datos = $this->evaluacion->promedioPorFechas();
                return $datos;
            }
		}
		
		//este es el controlador de item
		public function agregar(){
            if(!$_POST){
                $datos = $this->local->verLocales();
                $filas = mysqli_num_rows($datos);
                session_start();
                $_SESSION['filas'] = $filas;
                return $datos;
            }else{
                $this->item->set('idcategoria',$_POST['idcategoria']);
                $this->item->set('it_nombre',$_POST['it_nombre']);
                $this->item->set('it_descripcion',$_POST['it_descripcion']);
                $datos = $this->item->agregarItem();
                $row = mysqli_fetch_array($datos);
                for($i=1;$i<=$_SESSION['filas'];$i++){
                    if(isset($_POST['local'.$i])){
                        $this->item_local->set('iditem',$row['iditem']);
                        $this->item_local->set('idlocal',$_POST['local'.$i]);
                        $this->item_local->agregarItem_local();
                    }
                }
                unset($_SESSION['filas']);
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'principal/inicio/");
                                </script>';
                                exit();
            }
        }
        
        public function agregar_pregunta(){
            if(!$_POST){

            }else{
                $datos = $this->pregunta->ultimaPregunta();
                $row = mysqli_fetch_array($datos);
                $proximoid = $row['idpregunta'] + 1;
                $this->pregunta->set('idpregunta',$proximoid);
                $this->pregunta->set('preg_descripcion',$_POST['preg_descripcion']);
                $this->pregunta->agregarPregunta();
                //header("Location: ". URL ."control/ver_preguntas");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'control/ver_preguntas");
                                </script>';
                                exit();
            }
        }

        public function agregar_empleado(){
            if(!$_POST){

            }else{
                $this->empleado->set('emp_apellido',$_POST['emp_apellido']);
                $this->empleado->set('emp_nombre',$_POST['emp_nombre']);
                $this->empleado->set('emp_dni',$_POST['emp_dni']);
                $this->empleado->set('emp_celular',$_POST['emp_celular']);
                $this->empleado->set('idpuesto',$_POST['idpuesto']);
                $this->empleado->set('idlocal',$_POST['idlocal']);
                $this->empleado->set('emp_legajo',$_POST['emp_legajo']);
                $this->empleado->set('emp_domicilio',$_POST['emp_domicilio']);
                $this->empleado->agregarEmpleado();
                //header("Location: ". URL ."principal/inicio/");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'principal/inicio/");
                                </script>';
                                exit();
            }
        }

        public function ver(){
            if(!$_POST){

            }else{
                $this->item->set('idcategoria',$_POST['idcategoria']);
                $datos = $this->item->buscarItems();
                return $datos;
            }
        }
        
        public function ver_preguntas(){
            if(!$_POST){
                $datos = $this->pregunta->verPreguntas();
                return $datos;
            }else{
                
            }
        }

        public function ver_empleados(){
            if(!$_POST){
                $datos = $this->empleado->verEmpleados();
                return $datos;
            }else{
                
            }
        }

        public function editar($iditem){
            if(!$_POST){
                $this->item->set('iditem',$iditem);
                $datos = $this->item->buscarItem();
                return $datos;
            }else{
                $this->item->set('iditem',$iditem);
                $this->item->set('idcategoria',$_POST['idcategoria']);
                $this->item->set('it_nombre',$_POST['it_nombre']);
                $this->item->set('it_descripcion',$_POST['it_descripcion']);
                $this->item->updateItem();
                $this->item_local->set('iditem',$iditem);
                $this->item_local->eliminarItem_local();
                $datos = $this->local->verLocales();
                $filas = mysqli_num_rows($datos);
                for($i=1;$i<=$filas;$i++){
                    if(isset($_POST['local'.$i])){
                        $this->item_local->set('iditem',$iditem);
                        $this->item_local->set('idlocal',$_POST['local'.$i]);
                        $this->item_local->agregarItem_local();
                    }
                }
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'principal/inicio/");
                                </script>';
                                exit();
            }
        }
        
        public function editar_pregunta($idpregunta){
            if(!$_POST){
                $this->pregunta->set('idpregunta',$idpregunta);
                $datos = $this->pregunta->buscarPregunta();
                return $datos;
            }else{
                $this->pregunta->set('idpregunta',$idpregunta);
                $this->pregunta->set('preg_descripcion',$_POST['preg_descripcion']);
                $this->pregunta->updatePregunta();
                //header("Location: ". URL ."control/ver_preguntas");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'control/ver_preguntas");
                                </script>';
                                exit();
            }
        }

        public function editar_empleado($idempleado){
            if(!$_POST){
                $this->empleado->set('idempleado',$idempleado);
                $datos = $this->empleado->buscaEmpleado();
                return $datos;
            }else{
                $this->empleado->set('idempleado',$idempleado);
                $this->empleado->set('emp_apellido',$_POST['emp_apellido']);
                $this->empleado->set('emp_nombre',$_POST['emp_nombre']);
                $this->empleado->set('emp_dni',$_POST['emp_dni']);
                $this->empleado->set('emp_celular',$_POST['emp_celular']);
                $this->empleado->set('idpuesto',$_POST['idpuesto']);
                $this->empleado->set('idlocal',$_POST['idlocal']);
                $this->empleado->set('emp_legajo',$_POST['emp_legajo']);
                $this->empleado->set('emp_domicilio',$_POST['emp_domicilio']);
                $this->empleado->updateEmpleado();
                //header("Location: ". URL ."personal/ver");
                echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'personal/ver");
                                </script>';
                                exit();
            }
        }

        public function eliminar($iditem){
            $this->item->set('iditem',$iditem);
            $this->item->eliminarItem();
            $this->item_local->set('iditem',$iditem);
            $this->item_local->eliminarItem_local();
            echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'principal/inicio/");
                                </script>';
                                exit();
        }
        
        public function eliminar_pregunta($idpregunta){
            $this->pregunta->set('idpregunta',$idpregunta);
            $this->pregunta->eliminarPregunta();
            //header("Location: ". URL ."control/ver_preguntas");
            echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'control/ver_preguntas");
                                </script>';
                                exit();
        }
        
        public function eliminar_empleado($idempleado){
            $this->empleado->set('idempleado',$idempleado);
            $this->empleado->eliminarEmpleado();
            //header("Location: ". URL ."principal/inicio/");
            echo '<script type="text/javascript">
                                    window.location.assign("'.URL.'personal/ver");
                                </script>';
                                exit();
        }
	}
$control = new controlController();        
?>