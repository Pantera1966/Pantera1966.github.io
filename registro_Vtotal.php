<?php
//Se debe incluir la conexion a la base de datos
include_once ("conexion.php");

//Recibe todos los datos del formulario
	$consecutivo    = $_POST['Consecutivo'];
	$valorinv       = $_POST['VTotal_inventario'];
			
	echo "Los datos son los siguientes...:<br>";
	
	echo "$consecutivo, $fingreso";

	//echo $consulta;
	 //codigo que inserta los registros en la bd COMPUTADORAS
	
	//$conectar = conn();
	
	$sql = "INSERT INTO t_valor_inventario (Consecutivo, VTotal_inventario)
	VALUES ('$consecutivo', '$valorinv')";

	$resul = mysqli_query($mysqli,  $sql) or trigger_error("Query Failed! SQL-ERROR: ".mysqli_error($conectar), E_USER_ERROR);

	
	echo "$sql";


	
?>