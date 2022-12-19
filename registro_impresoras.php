<?php
//Se debe incluir la conexion a la base de datos
include_once ("conexion.php");

//Recibe todos los datos del formulario
	$consecutivo    = $_POST['Consecutivo'];
	$ingreso 		= $_POST['Fingreso'];
	$noplaca    	= $_POST['NoPlaca'];
	$ubicacion    	= $_POST['Ubicacion'];
	$marca  		= $_POST['Marca'];
	$modelo     	= $_POST['Modelo'];
	$tipoimpresora 	= $_POST['Tipoimpresora'];
	$tipoimpresion	= $_POST['Tipoimpresion'];
	$observacion 	= $_POST['Observaciones'];
			
	echo "Los datos son los siguientes...:<br>";
	
	echo "$consecutivo, $ingreso, $noplaca, $ubicacion, $marca, $modelo, $tipoimpresora, $tipoimpresion, $observacion";

	//codigo que inserta los registros en la bd Impresoras
	
		
	$sql = "INSERT INTO t_impresoras (Consecutivo, Fingreso, Noplaca, Ubicacion, Marca, Modelo, Tipoimpresora, Tipoimpresion, Observaciones)
	VALUES ('$consecutivo', '$ingreso', '$noplaca', '$ubicacion', '$marca', '$modelo', '$tipoimpresora', '$tipoimpresion', '$observacion')";

	$resul = mysqli_query($conectar,  $sql) or trigger_error("Query Failed! SQL-ERROR: ".mysqli_error($conectar), E_USER_ERROR);

	
?>