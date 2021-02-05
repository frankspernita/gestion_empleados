<?php namespace Config;

    class Autoload{
        public static function run(){
            spl_autoload_register(function($class){
                $ruta = str_replace("\\", "/", $class) . ".php";
                $ruta = explode("/",$ruta);
                $ruta = lcfirst($ruta[1]);
                
                //if(file_exists( $ruta )){
                    include $ruta;     
                //}else{echo $ruta;
                //exit();}
            });   
        }           
    }
?>