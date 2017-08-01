<?php
if (isset($_POST['nombre']) && isset($_POST['puntajemin']) && isset($_POST['puntajemax'])){
	include_once ("../db/connect.php");
	$link = conectar ();
	$result = mysqli_query($link, "SELECT * FROM reputacion WHERE nombre = '$_POST[nombre]'");
	$cant= mysqli_num_rows($result);
	if ($cant > 0){
		echo 1;
	}
	else {
		$result2 = mysqli_query($link, "SELECT * FROM reputacion WHERE puntajemin <= '$_POST[puntajemax]' AND puntajemax >= '$_POST[puntajemin]'");
		$cant2= mysqli_num_rows($result2);
		if ($cant2 > 0){
			echo 2;
		}
	}
	mysqli_close($link);
}
?>