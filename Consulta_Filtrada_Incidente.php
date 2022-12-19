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

	<title>Mesa de servicios</title>

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
				<th colspan="5"><h1>INCIDENTES MESA SERVICIOS</h1></th>
			</tr>
			<tr>
				<td bgcolor="Red" width="15%">
					<label><strong>No. incidente:</strong></label>
					<input type="text" name="noincidente">
				</td>

				<td bgcolor="lightgray">
					<input type="submit" name="enviar" value="BUSCAR">
					<input type="reset" name="enviar" value="LIMPIAR">
				</td>

				<td bgcolor="lightgray">
					<a href="Reporte_Mesa_servicios.php"><strong>Imprimir Reporte</strong></a>
				</td>

				<td bgcolor="lightgray">
					<a href="http://localhost/personal%20web/Act_Mesa_servicios.html"><strong>Ingresar Nuevo registro</strong></a>
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
			<td width="3%">ID</td>   
			<th width="6%">No.incidente</th>
			<th width="8%">Fecha Ingreso</th>
			<th width="8%">Fecha respuesta</th>
			<th width="25%">Descripcion</th>
			<th width="5%">Respondido</th>
			<th width="25%">Comentario</th>
			<!--<th width="10%">Acciones</th>  -->
		</tr>
</table>
<tbody>
	<?php
		if (isset($_POST['enviar'])){
			//SE MUESTRA LA BUSQUEDA DE UN SOLO REGISTRO
		
						$incidente = $_POST['noincidente'];
													
						if(empty($_POST['noincidente'])){
							echo "<script language = 'JavaScript'>
							alert('El campo No. Incidente no puede ser vacio...!');
							location.assign('Consulta_Filtrada_incidente.php');
							</script>";
						}else{

						if (empty($_POST['$incidente'])){
						$sql = "SELECT * from t_mesa_servicios where 
						NoIncidente like '%".$incidente."%'";

					}	
				}

				$resultado = mysqli_query($conectar, $sql);
				while ($filas = mysqli_fetch_assoc($resultado)) {
				?>
				<table width="100%" border="1" bordercolor="#0000FF" cellspacing="15" cellpadding="5"> 
					<tr bgcolor="cream">
						<td><?php echo $filas['id'] ?></td>  
						<td><?php echo $filas['NoIncidente'] ?></td>
						<td><?php echo $filas['Fingreso'] ?></td>
						<td><?php echo $filas['Frespuesta'] ?></td>
						<td><?php echo $filas['Descrip_solicitado'] ?></td>
						<td><?php echo $filas['Respondido'] ?></td>
						<td><?php echo $filas['Comentario'] ?></td>

						<?php echo "<a href= 'editar.php?id=".$filas['id']."'>EDITAR</a>"; ?>
							-
						<?php echo "<a href= 'eliminar.php?id=".$filas['id']."'onclick = 'return confirmar()'>ELIMINAR</a>"; ?>
						
				</table>  
				<td>	
									
				</td>
				</tr>
			<?php
		}

		}else{

			//SE MUESTRA TODOS LOS REGISTOS EN EL REPORTES

			$sql = "SELECT * from t_mesa_servicios";
			$resultado = mysqli_query($conectar, $sql);
			while ($filas = mysqli_fetch_assoc($resultado)) {
			?>
				<table width="100%" border="1" bordercolor="#0000FF" cellspacing="15" cellpadding="5">  
					<tr>
						<td width="2%"><?php echo $filas['id'] ?></td>
						<td width="7%"><?php echo $filas['NoIncidente'] ?></td>
						<td width="8%"><?php echo $filas['Fingreso'] ?></td>
						<td width="9%"><?php echo $filas['Frespuesta'] ?></td>
						<td width="29%"><?php echo $filas['Descrip_solicitado'] ?></td>
						<td width="5%"><?php echo $filas['Respondido'] ?></td>
						<td width="29%"><?php echo $filas['Comentario'] ?></td>
						
					<td>
				</table>  
					<td> 
						<?php echo "<a href= 'editar.php?id=".$filas['id']."'>EDITAR</a>"; ?>
						-
						<?php echo "<a href= 'eliminar.php?id=".$filas['id']."'onclick = 'return confirmar()'>ELIMINAR</a>"; ?>
					</td>
				</tr>
			<?php
				}
			}
		?>
		
</tbody> 
</body>
</html>
