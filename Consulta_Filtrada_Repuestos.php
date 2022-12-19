<!-- Capitulo 1: https://www.youtube.com/watch?v=T-XFIgd_6fM 
     Capitulo 2: https://www.youtube.com/watch?v=bvxVtUdPVU8-->
<?php
include ("conexion.php");
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Filtro inventario</title>

			<script type="text/javascript">
					function confirmar(){
					return confirmar('Esta seguro de eliminar los datos...?');
					}
			</script>

</head>

<body>
	<form action="<?= $_SERVER['PHP_SELF']?>" method="POST">
		<table width="100%" border="1" bordercolor="#0000FF" cellpadding="10" cellpadding="10">  
			<tr bgcolor="lightblue">
				<th colspan = "5"><h1>CONSULTA INVENTARIO</h1></th>
			<tr>
				<td bgcolor="Red" width="15%">
					<label><strong>Codigo a buscar:</strong></label>
					<input type="text" name="codigocatal">
				</td>

				<td bgcolor="lightgray">
					<input type="submit" name="enviar" value="ENVIAR">
					<input type="reset" name="enviar" value="LIMPIAR">
				</td>

				<td bgcolor="lightgray">
					<a href="http://localhost/personal%20web/Reporte_inv.php"><strong>Imprimir Reporte</strong></a>
				</td>

				<td bgcolor="lightgray">
					<a href="http://localhost/personal%20web/Act_Inventario.html"><strong>Ingresar Nuevo registro</strong></a>
				</td>

				<td bgcolor="lightgray">
					<a href="http://localhost/Personal%20web/Index_principal.html"><strong>SALIR</strong></a>
				</td>
			</tr>
		</table>
	</form>
<table table width="100%" border="1" bordercolor="#0000FF" cellspacing="1" cellpadding="5">  

	<!--      ENCABEZADO DE LA TABLA    -->
	<thead> 
		<tr bgcolor="lightblue">	
			<td>ID</td>   
			<th>Codigo</th>
			<th>Descripcion</th>
			<th>Fecha ingreso</th>
			<th>Cantidad</th>
			<th width="4%">UD</th>
			<th>Precio</th>
			<th>Sub total</th>
			<th>Observaciones</th>
			<th>Factura</th>
			<th>Proveedor</th>
		</tr>
</table>
<tbody>
	<?php
		if (isset($_POST['enviar'])){
			//SE MUESTRA LA BUSQUEDA DE UN SOLO REGISTRO
		
						$codigo = $_POST['codigocatal'];

						if(empty($_POST['codigocatal'])){
							echo "<script language = 'JavaScript'>
							alert('El campo Codigo inventario no puede ser vacio...!');
							location.assign('Consulta_Filtrada_Repuestos.php');
							</script>";
						}else{

						if (empty($_POST['$codigo'])){
						$sql = "SELECT * from t_inventarios where 
						Cod_inventario = '$codigo'";

						
					}	
				}

				$resultado = mysqli_query($conectar, $sql);
				while ($filas = mysqli_fetch_assoc($resultado)) {
				?>
				<table width="100%" border="1" bordercolor="#0000FF" cellspacing="15" cellpadding="5"> 
					<tr>
						<th colspan="11" bgcolor="cream"><h1><marquee>Informacion del registro</marquee></h1></th>
					</tr>
						<tr bgcolor="cream">
							<td width="3%"><?php echo $filas['Id_inventario'] ?></td>  
							<td width="6%"><?php echo $filas['Cod_inventario'] ?></td>
							<td width="28%"><?php echo $filas['Descrip_inventario'] ?></td>
							<td width="10%"><?php echo $filas['Fingreso_inventario'] ?></td>
							<td width="7%"><?php echo $filas['Cant_inventario'] ?></td>
							<td width="4%"><?php echo $filas['Ud_inventario'] ?></td>
							<td width="5%"><?php echo $filas['Precio_inventario'] ?></td>
							<td width="8%"><?php echo $filas['Sub_total_inventario'] ?></td>
							<td width="13%"><?php echo $filas['Observaciones'] ?></td>
							<td width="8%"><?php echo $filas['Factura'] ?></td>
							<td><?php echo $filas['Proveedor'] ?></td>
						</tr>

				</table>  
				<td>	
									
				</td>
				
			
			<?php
		}

		}else{

			//SE MUESTRA TODOS LOS REGISTOS EN EL REPORTES  //

			$sql = "SELECT * from t_inventarios";
			$resultado = mysqli_query($conectar, $sql);
			while ($filas = mysqli_fetch_assoc($resultado)) {
			?>
				<table width="100%" border="1" bordercolor="#0000FF" cellspacing="15" cellpadding="5"> 
						<tr bgcolor="cream">
							<td width="3%"><?php echo $filas['Id_inventario'] ?></td>  
							<td width="6%"><?php echo $filas['Cod_inventario'] ?></td>
							<td width="28%"><?php echo $filas['Descrip_inventario'] ?></td>
							<td width="10%"><?php echo $filas['Fingreso_inventario'] ?></td>
							<td width="7%"><?php echo $filas['Cant_inventario'] ?></td>
							<td width="4%"><?php echo $filas['Ud_inventario'] ?></td>
							<td width="5%"><?php echo $filas['Precio_inventario'] ?></td>
							<td width="8%"><?php echo $filas['Sub_total_inventario'] ?></td>
							<td width="13%"><?php echo $filas['Observaciones'] ?></td>
							<td width="8%"><?php echo $filas['Factura'] ?></td>
							<td><?php echo $filas['Proveedor'] ?></td>
						</tr>

				</table>  
					
				</tr>
			<?php
				}
			}
		?>	
		
</tbody> 
</body>
</html>