<!DOCTYPE html>
<html>
<!--Video grabar registros con php y html:
Parte no. 1: https://www.youtube.com/watch?v=B5MT8PFjcGk   
Parte no. 2: https://www.youtube.com/watch?v=AZpKqEQS4e4
Parte no. 3: https://www.youtube.com/watch?v=sWHw4ExP2hw  

Clase de profesor, muy buena:
https://www.youtube.com/watch?v=C-p9YlwExhM   -->
<?php include_once ("conexion.php") ?>
	<head>
		<title>valor inventario</title>
		<link rel="stylesheet" type="text/css" href="css/computadoras.css">
		<meta name="viewport"  content="width=device-width, user=scalable=si, initial=scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
	<meta charset= "UTF-8">
	</head>

	<img src="img/Logo_ccss.jpg" alt="Mi Firma Digital" heigh="	150" width="100" align="top" > <i><strong>Almacen General CDC</strong>

	<img src="img/Logo_ccss.jpg" alt="Mi Firma Digital" heigh="	150" width="100" align="right">

	<body>
		
		<h1>INVENTARIO SUMINSTROS PARA COMPUTO</h1>
		<center>
			<div class="form">
				<form name = "form" action ="" method="POST">
					<fieldset class="cuadro">
						<label> * VALOR DE INVENTARIO ACTUAL *</label>

						<?php
							$consulta = "SELECT SUM(Sub_total_inventario) as VALOR_INVENTARIO FROM `t_inventarios`";
							$resultado = mysqli_query($conectar, $consulta);
							$valor = mysqli_fetch_array($resultado);
							$caja = $valor['VALOR_INVENTARIO'];

							echo "$caja";

						?>
																		
					</fieldset><br>

						<div class="nav">
					
						<input type ="submit" name = "regresar" value="Regresar">
						
												
				</form>
			</div>
		</center>
	</body><br><br><br><br><br><br><br>

			<footer class="PaginaAnterior">
				<a href="http://localhost:82/Personal%20web/Index_principal.html">Volver Atrás</a>
			</footer>
			

	<FOOTER class = "piepagina">
		Programador: Ing. Wilson Herrera Umaña
	</FOOTER>  
</html>