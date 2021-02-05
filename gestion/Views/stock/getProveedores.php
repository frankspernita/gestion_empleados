<?php
	$idproveedor1 = $_POST['idproveedor1'];

	//$con = new Conexion ();
	$dbconn= mysqli_connect("localhost", "sppfla5", "Sentey@82.", "sppfla5_havanna")
		or die('No pudo conectarse: ' . \mysqli_error($dbconn));
		mysqli_query($dbconn,"set names 'utf8';");
    if($idramaestrategica1 == NULL){
		$sql = "SELECT * FROM proveedor ORDER BY idproveedor";
	}else{
		$sql = "SELECT * FROM proveedor where idproveedor<>$idproveedor1 ORDER BY idproveedor";
	}
	$datos1 = mysqli_query($dbconn,$sql);
	$sql2 = "SELECT * FROM proveedor where idproveedor=$idproveedor1 ORDER BY idproveedor";
	$datos2 = mysqli_query($dbconn,$sql2);
	$row2 =  mysqli_fetch_array($datos2);
	echo '<option value="NULL">Seleccionar proveedor</option>';
	if(isset($row2)){
	echo '<option value="'.$row2['idproveedor'].'" selected>'.$row2['prov_nombre'].'</option>';
	}
	while ( $row =  mysqli_fetch_array($datos1))    
	                    { 
	                       
	                        echo '<option value="'.$row['idproveedor'].'">'.$row['prov_nombre'].'</option>';
	                        
	                        
	                    }