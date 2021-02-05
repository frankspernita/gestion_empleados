<?php
	$idlocal1 = $_POST['idlocal1'];
	$localactual = $_POST['localactual'];

	//$con = new Conexion ();
	$dbconn= mysqli_connect("localhost", "sppfla5", "Sentey@82.", "sppfla5_havanna")
		or die('No pudo conectarse: ' . \mysqli_error($dbconn));
		mysqli_query($dbconn,"set names 'utf8';");
    if($localactual == 0){
		$sql = "SELECT * FROM local WHERE idlocal<>$localactual ORDER BY idlocal";
	}else{
		$sql = "SELECT * FROM local where idlocal = $localactual ORDER BY idlocal";
	}
	$datos1 = mysqli_query($dbconn,$sql);
	$sql2 = "SELECT * FROM local where idlocal=$idlocal1 ORDER BY idlocal";
	$datos2 = mysqli_query($dbconn,$sql2);
	$row2 =  mysqli_fetch_array($datos2);
	if($localactual == 0){
	    echo '<option value="NULL">Seleccionar local</option>';
	}
	if(isset($row2)){
	echo '<option value="'.$row2['idlocal'].'" selected>'.$row2['loc_nombre'].'</option>';
	}
	while ( $row =  mysqli_fetch_array($datos1))    
	                    { 
	                       
	                        echo '<option value="'.$row['idlocal'].'">'.$row['loc_nombre'].'</option>';
	                        
	                        
	                    }