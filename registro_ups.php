<?php
//Se debe incluir la conexion a la base de datos
include_once ("conexion.php");

//Recibe todos los datos del formulario
	$consecutivo    = $_POST['Consecutivo'];
	$placa  		= $_POST['Placa'];
	$fingreso		= $_POST['Fingreso'];
	$ubicacion  	= $_POST['Ubicacion'];
	$marca   		= $_POST['Marca'];
	$modelo     	= $_POST['Modelo'];
	$observaciones 	= $_POST['Observaciones'];
	
	/*echo "Los datos son los siguientes...:<br>";
	echo "$consecutivo, $placa, $fingreso, $ubicacion, $marca, $modelo,$observaciones";*/

	 //codigo que inserta los registros en la bd UPS
	
	$sql = "INSERT INTO t_ups (Consecutivo, Placa, Fingreso, Ubicacion, Marca, Modelo, Observaciones)
	VALUES ('$consecutivo', '$placa', '$fingreso', '$ubicacion', '$marca', '$modelo', '$observaciones')";

	$resul = mysqli_query($conectar,  $sql) or trigger_error("Query Failed! SQL-ERROR: ".mysqli_error($conectar), E_USER_ERROR);
		
?>