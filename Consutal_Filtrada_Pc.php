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

	<title>Filtro Computadoras</title>

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
				<th colspan = "5"><h1>CONSULTA ACTIVO PC</h1></th>
			<tr>
				<td bgcolor="Red" width="15%">
					<label><strong>Placa a buscar:</strong></label>
					<input type="text" name="placaPc">
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
<table width="100%" table border="1" bordercolor="#0000FF" cellspacing="1" cellpadding="5">  

	<!--      ENCABEZADO DE LA TABLA    -->
	<thead> 
		<tr bgcolor="lightblue">	
			<td>ID</td>   
			<th>Fecha ingreso</th>
			<th>Placa</th>
			<th>Ubicacion</th>
			<th>Marca</th>
			<th>Modelo</th>
			<th>Windows</th>
			<th>Office</th>
			<th>Procesador</th>
			<th>Memoria</th>
			<th>Disco duro</th>
			<th>Plataforma</th>

		</tr>
</table>
<tbody>
	<?php
		if (isset($_POST['enviar'])){
			//SE MUESTRA LA BUSQUEDA DE UN SOLO REGISTRO
		
						$placa = $_POST['placaPc'];

						if(empty($_POST['placaPc'])){
							echo "<script language = 'JavaScript'>
							alert('El campo Codigo inventario no puede ser vacio...!');
							location.assign('Consulta_Filtrada_Repuestos.php');
							</script>";
						}else{

						if (empty($_POST['$placa'])){
						$sql = "SELECT * from t_computadoras where 
						NoPlaca = '$placa'";

						
					}	
				}

				$resultado = mysqli_query($conectar, $sql);
				while ($filas = mysqli_fetch_assoc($resultado)) {
				?>
				<table border="1" bordercolor="#5F9EA0" cellspacing="15" cellpadding="5"> 
					<tr>
						<th width="100%"colspan="12" bgcolor="#A9E2F3"><h1><marquee>Informacion del registro</marquee></h1></th>
					</tr> 
						<tr bgcolor="cream">
							<td width="3%"><?php echo $filas['Consecutivo'] ?></td>  
							<td width="6%"><?php echo $filas['FIngreso'] ?></td>
							<td width="28%"><?php echo $filas['NoPlaca'] ?></td>
							<td width="10%"><?php echo $filas['Ubicacion'] ?></td>
							<td width="7%"><?php echo $filas['Marca'] ?></td>
							<td width="4%"><?php echo $filas['Modelo'] ?></td>
							<td width="5%"><?php echo $filas['Windows'] ?></td>
							<td width="8%"><?php echo $filas['Office'] ?></td>
							<td width="13%"><?php echo $filas['Procesador'] ?></td>
							<td width="8%"><?php echo $filas['Memoria'] ?></td>
							<td><?php echo $filas['Discoduro'] ?></td>
							<td><?php echo $filas['Plataforma'] ?></td>
						</tr>

				</table>  
				<td>	
									
				</td>
				
			
			<?php
		}

		}else{

			//SE MUESTRA TODOS LOS REGISTOS EN EL REPORTES  //

			$sql = "SELECT * from t_computadoras";
			$resultado = mysqli_query($conectar, $sql);
			while ($filas = mysqli_fetch_assoc($resultado)) {
			?>
				<table width="100%" border="1" bordercolor="#0000FF" cellspacing="15" cellpadding="5"> 
						<tr bgcolor="cream">
							<td width="3%"><?php echo $filas['Consecutivo'] ?></td>  
							<td width="6%"><?php echo $filas['FIngreso'] ?></td>
							<td width="28%"><?php echo $filas['NoPlaca'] ?></td>
							<td width="10%"><?php echo $filas['Ubicacion'] ?></td>
							<td width="7%"><?php echo $filas['Marca'] ?></td>
							<td width="4%"><?php echo $filas['Modelo'] ?></td>
							<td width="5%"><?php echo $filas['Windows'] ?></td>
							<td width="8%"><?php echo $filas['Office'] ?></td>
							<td width="13%"><?php echo $filas['Procesador'] ?></td>
							<td width="8%"><?php echo $filas['Memoria'] ?></td>
							<td><?php echo $filas['Discoduro'] ?></td>
							<td><?php echo $filas['Plataforma'] ?></td>
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