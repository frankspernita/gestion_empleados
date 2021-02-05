<?php namespace Config;


    class Request{

		private $controlador;
		private $metodo;
		private $argumento;

		public function __construct(){
                   // session_start();
            define('__ROOT__',dirname(dirname(__FILE__)));       
			if(isset($_GET['url'])){
				$ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
				$ruta = explode("/", $ruta);
				$ruta = array_filter($ruta);
                                //echo $ruta;
                                
                if($ruta[0] == "verificar.php"){
                                    //echo "here";
					$this->controlador = "log";
				}else{
                                    if(isset($_SESSION['us_name'])&&isset($_SESSION['us_password']))
                                    {
                                    //echo "here2";
					$this->controlador = strtolower(array_shift($ruta));
                                    }else{ 
                                        $root = $_SERVER['REQUEST_URI'];
                                        
                                        if($root == '/log/restablecer' || $root == '/log/cambiar_password'){
                                            $this->controlador = "log";
                                        }else{
                                            require_once "Views/error/error401.php";
                                        }
                                    }
                                    
				}
				
		
				$this->metodo = strtolower(array_shift($ruta));
				if(!$this->metodo){
                                   // echo "here4";
                    require_once(__ROOT__.'/Views/error/error404.php');
					$this->metodo = "index";
				}
				$root = $_SERVER['REQUEST_URI'];
                if($root == '/log/restablecer'){
                    $this->metodo = "restablecer";
                }else{
                    if($root == '/log/cambiar_password'){
                        $this->metodo = "cambiar_password";
                    }
                }
				$this->argumento = $ruta;
			}else{
                            //echo "here1";
				$this->controlador = "log";
				$this->metodo = "verificar";
			}
        }
                                    
            public function getControlador() {
                return $this->controlador;
            }

            public function getMetodo() {
                return $this->metodo;
            }

            public function getArgumento() {
                return $this->argumento;
            }                                  
    }  
?>