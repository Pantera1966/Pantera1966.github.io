<?php
// Configuracion necesaria para acceder a la data base.
	function conn() {
	$hostname   = "localhost";
	$usuarios   = "root";
	$passworddb = "";
	$dbname     = "scaw";

//Generando la conexion con el servidor.
	$conectar = mysqli_connect($hostname, $usuarios, $passworddb, $dbname);

	return $conectar;
}

?>