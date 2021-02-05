<?php
	$idcategoria1 = $_POST['idcategoria1'];

	//$con = new Conexion ();
	$dbconn= mysqli_connect("localhost", "sppfla5", "Sentey@82.", "sppfla5_havanna")
		or die('No pudo conectarse: ' . \mysqli_error($dbconn));
		mysqli_query($dbconn,"set names 'utf8';");
    if($idramaestrategica1 == NULL){
		$sql = "SELECT * FROM categoria ORDER BY idcategoria";
	}else{
		$sql = "SELECT * FROM categoria where idcategoria<>$idcategoria1 ORDER BY idcategoria";
	}
	$datos1 = mysqli_query($dbconn,$sql);
	$sql2 = "SELECT * FROM categoria where idcategoria=$idcategoria1 ORDER BY idcategoria";
	$datos2 = mysqli_query($dbconn,$sql2);
	$row2 =  mysqli_fetch_array($datos2);
	echo '<option value="NULL">Seleccionar categoría</option>';
	if(isset($row2)){
	echo '<option value="'.$row2['idcategoria'].'" selected>'.$row2['cat_nombre'].'</option>';
	}
	while ( $row =  mysqli_fetch_array($datos1))    
	                    { 
	                       
	                        echo '<option value="'.$row['idcategoria'].'">'.$row['cat_nombre'].'</option>';
	                        
	                        
	                    }