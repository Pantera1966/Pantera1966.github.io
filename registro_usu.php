<?php
//Se debe incluir la conexion a la base de datos
include_once ("conexion.php");

//Recibe todos los datos del formulario
	$consecutivo    = $_POST['consecutivo_usu'];
	$nombre 		= $_POST['Nombre'];
	$ape1 			= $_POST['Apellido1'];
	$ape2       	= $_POST['Apellido2'];
	$cedula  		= $_POST['Cedula'];
	$depa        	= $_POST['Departamento'];
			
	echo "Los datos son los siguientes...:<br>";
	
	echo "$consecutivo, $nombre, $ape1, $ape2, $cedula, $depa;

	echo $consulta;
	 //codigo que inserta los registros en la bd COMPUTADORAS
	
	$conectar = conn();
	
	$sql = "INSERT INTO t_usuarios (consecutivo_usu, Nombre, Apellido1, Apellido2, Cedula, Departamento)
	VALUES ('$consecutivo', '$nombre', '$ape1', '$ape2', '$cedula', '$depa')";

	$resul = mysqli_query($conectar,  $sql) or trigger_error("Query Failed! SQL-ERROR: ".mysqli_error($conectar), E_USER_ERROR);

	
	echo "$sql";


	
?>