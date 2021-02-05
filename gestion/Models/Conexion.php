<?php //namespace Models;

// function logs($module, $s)
// {
// 	//$logfilename = "mpipn.log";
// 	date_default_timezone_set("America/Argentina/Tucuman");
// 	$now = new DateTime();
// 	//logstr($logfilename, "\n\n" . $now->format('Y-m-d H:i:s') . "\n");
// 	$logfilename = "savanna-" . $now->format('Ymd') . ".log";
// 	$logmessage = $module . " : " . $now->format('Y-m-d H:i:s') . " : " . $s . "\n";
// 	if (file_exists($logfilename))
// 		file_put_contents($logfilename, $logmessage, FILE_APPEND);
// 	else
// 		file_put_contents($logfilename, $logmessage);
// }

	class Conexion{

	private $con;

        
    public function __construct(){ 
         if(!isset($this->con)){
             $this->con = mysqli_connect("localhost", "sppfla5", "Sentey@82.", "sppfla5_havanna")
             or die('No pudo conectarse: ' . \mysqli_error($this->con));
             mysqli_query($this->con,"set names 'utf8';");

    }
  
  }

	public function consultaSimple($sql){
		$resultado = mysqli_query($this->con,$sql);
		if(!$resultado){
			echo '<strong>¡Error!</strong> <br>'. \mysqli_error($this->con). '<br>'. $sql . '<br>';
			echo '<a href="'.URL.'principal/buscar">VOLVER</a>';
			exit();
		}
	}

	public function consultaRetorno($sql){
		// logs('Conexion.php', 'SQL: ');
		$datos = mysqli_query($this->con,$sql);
		if(!$datos){
			logs('Conexion.php', ' ERROR:' . mysql_errno($this->con) . ':"' . mysql_error($this->con) . '"');
			echo '<strong>¡Error!</strong> <br>'. \mysqli_error($this->con). '<br>'. $sql . '<br>';
			echo '<a href="'.URL.'principal/buscar">VOLVER</a>';
			exit();
		}else{
			// logs('Conexion.php', ' OK ');
			return $datos;
		}
	}
}
?>