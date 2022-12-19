<?php
//Se debe incluir la conexion a la base de datos
include_once ("conexion.php");

//Recibe todos los datos del formulario Activos Inventarios
	$consecutivo    = $_POST['Id_inventario'];
	$codigo 		= $_POST['Cod_inventario'];
	$descripcion	= $_POST['Descrip_inventario'];
	$ingreso    	= $_POST['Fingreso_inventario'];
	$cantidad  		= $_POST['Cant_inventario'];
	$unidad     	= $_POST['Ud_inventario'];
	$precio     	= $_POST['Precio_inventario'];
	$subtotal 		= $_POST['Sub_total_inventario'];
	$observacion 	= $_POST['Observaciones'];
	$factura    	= $_POST['Factura'];
	$proveedor		= $_POST['Proveedor'];
			
	echo "Estos datos fueron ingresados con exito....!:<br>";
	
	echo "$consecutivo, $codigo, $descripcion, $ingreso, $cantidad, $unidad, $precio, $subtotal, $observacion, $factura, proveedor";

	//codigo que inserta los registros en la bd INVENTARIOS
	
	$conectar = $mysqli;

	// --------------- insert para base datos datos ------------------- //
	
	$sql = "INSERT INTO t_inventarios (Id_inventario, Cod_inventario, Descrip_inventario, Fingreso_inventario, Cant_inventario, Ud_inventario, Precio_inventario, Sub_total_inventario, Observaciones, Factura, Proveedor)
	VALUES ('$consecutivo', '$codigo', '$descripcion', '$ingreso', '$cantidad', '$unidad','$precio', '$subtotal', '$observacion', '$factura', $Proveedor)";

	// --------------- insert para base de datos ------------------- //

	

	$resul = mysqli_query($conectar,  $sql) or trigger_error("Query Failed! SQL-ERROR: ".mysqli_error($conectar), E_USER_ERROR);

	
	//echo "$sql";
	
?>