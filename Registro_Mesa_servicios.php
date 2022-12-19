<?php
//Se debe incluir la conexion a la base de datos
require 'conexion.php';

//Recibe todos los datos del formulario
	$id             = $_POST['id'];
	$noincidente	= $_POST['NoIncidente'];
	$fingreso		= $_POST['Fingreso'];
	$frespuesta  	= $_POST['Frespuesta'];
	$solicitado		= $_POST['Descrip_solicitado'];
	$respondido    	= $_POST['Respondido'];
	$comentario    	= $_POST['Comentario'];
	
	
		
	/*echo $consulta;
	codigo que inserta los registros en la bd Mesa de Servicios
	
	$conectar = $conn();*/
	
	$sql = "INSERT INTO t_mesa_servicios (id, NoIncidente, Fingreso, Frespuesta, Descrip_solicitado, Respondido, Comentario)
	VALUES ('$id', '$noincidente', '$fingreso', '$frespuesta', '$solicitado', '$respondido', '$comentario')";

	$resul = mysqli_query($conectar,  $sql) or trigger_error("Query Failed! SQL-ERROR: ".mysqli_error($conectar), E_USER_ERROR);

	
	//echo "$sql";


	
?>