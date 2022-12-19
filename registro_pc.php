<?php
//Se debe incluir la conexion a la base de datos
include('conexion.php');

//Recibe todos los datos del formulario Act_Computadoras.html
	$consecutivo    = $_POST['Consecutivo'];
	$ingreso 		= $_POST['FIngreso'];
	$placa 			= $_POST['NoPlaca'];
	$ubicacion  	= $_POST['Ubicacion'];
	$marca   		= $_POST['Marca'];
	$modelo     	= $_POST['Modelo'];
	$windows    	= $_POST['Windows'];
	$office 		= $_POST['Office'];
	$procesador 	= $_POST['Procesador'];
	$memoria    	= $_POST['Memoria'];
	$discoduro 		= $_POST['Discoduro'];
	$plataforma 	= $_POST['Plataforma'];
		
	echo "Los datos a ingresar, son los siguientes...:<br>";
	
	echo "$consecutivo, $ingreso, $placa, $ubicacion, $marca, $modelo, $windows, $office, $procesador, $memoria, $discoduro, $plataforma";

	/*echo $consulta;*/
	//codigo que inserta los registros en la bd COMPUTADORAS
	
	/*$conectar = conn();*/
	
	$sql = "INSERT INTO t_computadoras (Consecutivo, FIngreso, NoPlaca, Ubicacion, Marca, Modelo, Windows, Office, Procesador, Memoria, Discoduro, Plataforma)
	VALUES ('$consecutivo', '$ingreso', '$placa', '$ubicacion', '$marca', '$modelo', '$windows', '$office', '$procesador', '$memoria', '$discoduro', '$plataforma')";

	$resul = mysqli_query($conectar,  $sql) or trigger_error("Query Failed! SQL-ERROR: ".mysqli_error($conectar), E_USER_ERROR);

	
	//echo "$sql";


	
?>