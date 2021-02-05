<?php namespace Config;

	class Enrutador{

		public static function run(Request $request){
			$controlador = $request->getControlador() . "Controller";
			$ruta = ROOT . "Controllers" . DS . $controlador . ".php";
			$metodo = $request->getMetodo();
			$argumento = $request->getArgumento();
			if($metodo == "index.php"){
				$metodo = "index";
			}
			
			if(file_exists($ruta)){
				require_once ($ruta);
				$mostrar = "Controllers\\" . $controlador;
				if($_SERVER[REQUEST_URI]=='/principal/inicio/'){
				    $controlador = new $controlador;   
				}else{
				    $controlador = new $controlador;   
				}
				if(!isset($argumento)){
					$datos = call_user_func(array($controlador, $metodo));
				}else{
                    // error_reporting(0); // esto se controla por php.ini o .user.ini , los errores de php van a errors.log
                    /*
                    
                    date.timezone = 'America/Argentina/Tucuman'
                    
                    log_errors = on
                    error_reporting = E_ALL & ~E_WARNING & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED   <- evita loggear warnings o mensajes que no sean errores
                    error_log = errors.log
                    
                    si queres ver los errores en pantalla deberias habilitar
                    display_errors = On

                    */
					$datos = call_user_func_array(array($controlador, $metodo), $argumento);
				}
				$ruta = ROOT . "Views" . DS . $request->getControlador() . DS . $request->getMetodo() . ".php";
				if(is_readable($ruta)){
					require_once $ruta;
				}else{
                    if($_SERVER['REQUEST_URI'] != '/havanna/log/restablecer' || $_SERVER['REQUEST_URI'] != '/havanna/log/cambiar_password'){

					}else{
						require_once "Views/error/error404.php";
					}
				}
			}	
		}
	}
?>