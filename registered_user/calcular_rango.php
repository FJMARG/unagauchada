<?php 	
	$result = mysqli_query ($link, "SELECT nombre FROM reputacion WHERE '$datos[puntaje]' >= puntajemin AND '$datos[puntaje]' <= puntajemax ");
	$rango = mysqli_fetch_array($result);
	echo " (".$rango['nombre'].")";  
?>