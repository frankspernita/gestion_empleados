<?php
	$iditem = $_POST['iditem'];

	//$con = new Conexion ();
	$dbconn= mysqli_connect("localhost", "sppfla5", "Sentey@82.", "sppfla5_havanna")
		or die('No pudo conectarse: ' . \mysqli_error($dbconn));
		mysqli_query($dbconn,"set names 'utf8';");
    if($idramaestrategica1 == NULL){
		$sql = "SELECT `local`.idlocal, `local`.loc_nombre FROM local ORDER BY idlocal";
	}
	$datos1 = mysqli_query($dbconn,$sql);
	$sql2 = "SELECT `local`.idlocal, `local`.loc_nombre FROM `local`, item_local where `local`.idlocal = item_local.idlocal AND item_local.iditem=$iditem GROUP BY idlocal ORDER BY idlocal";
	$datos2 = mysqli_query($dbconn,$sql2);
    while ( $row2 =  mysqli_fetch_array($datos2)){
	    $locales[] = $row2['idlocal'];
	}
	$cont = 0;
	while ( $row =  mysqli_fetch_array($datos1))    
	                    { 
	                       if($row['idlocal']==$locales[$cont]){
	                            echo '<div class="form-check"><input class="form-check-input" type="checkbox" value="'.$row['idlocal'].'" name="local'.$row['idlocal'].'" id="local'.$row['idlocal'].'"checked>';
	                            echo '<label class="form-check-label" for="local'.$row['idlocal'].'">
                                        '.$row['loc_nombre'].'
                                    </label></div>';
                            $cont++;
	                       }else{
	                            echo '<div class="form-check"><input class="form-check-input" type="checkbox" value="'.$row['idlocal'].'" name="local'.$row['idlocal'].'" id="local'.$row['idlocal'].'">';
	                            echo '<label class="form-check-label" for="local'.$row['idlocal'].'">
                                        '.$row['loc_nombre'].'
                                    </label></div>';
	                       }
	                        
	                    }