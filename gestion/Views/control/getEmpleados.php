<?php
	$dbconn= mysqli_connect("localhost", "sppfla5", "Sentey@82.", "sppfla5_havanna")
		or die('No pudo conectarse: ' . \mysqli_error($dbconn));
		mysqli_query($dbconn,"set names 'utf8';");
		
	$sql = "SELECT * FROM empleado ORDER BY emp_apellido, emp_nombre DESC";
	if(!isset($_POST['searchTerm'])){ 
      $fetchData = mysqli_query($dbconn,"SELECT * FROM empleado ORDER BY emp_apellido, emp_nombre DESC limit 5");
    }else{ 
      $search = $_POST['searchTerm'];   
      $fetchData = mysqli_query($dbconn,"SELECT * FROM empleado where emp_apellido LIKE '%".$search."%' OR emp_nombre LIKE '%".$search."%' ORDER BY emp_apellido, emp_nombre limit 5");
    } 
    
    $data = array();
    while ($row = mysqli_fetch_array($fetchData)) {    
      $data[] = array("id"=>$row['idempleado'], "text"=>$row['emp_apellido'].', '.$row['emp_nombre']);
    }
    echo json_encode($data);