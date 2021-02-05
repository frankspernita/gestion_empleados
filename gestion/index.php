<?php
    session_start();

	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
    define('URL', "http://havannagestion.com.ar/");

        
    $ruta1 = $_SERVER['REQUEST_URI'];
	require_once "Config/autoload.php";
	Config\Autoload::run();
    if($ruta1 != "/" && $ruta1 != "/log/validar" && isset($_SESSION['us_name']) && isset($_SESSION['us_password']))
    {
          require_once "Views/template.php";
    }
	Config\Enrutador::run(new Config\Request());
    if($ruta1 != "/" && $ruta1 != "/log/validar" && isset($_SESSION['us_name']) && isset($_SESSION['us_password']))
          include 'h_footer.php';
?>