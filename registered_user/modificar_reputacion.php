<?php
	include_once ('../db/connect.php');
	$link = conectar();
	$resultado = mysqli_query($link , "SELECT * from reputacion where nombre LIKE '$_POST[nombrereputacion]'");
	if(mysqli_num_rows($resultado) == 0){
		mysqli_query($link, "UPDATE reputacion SET reputacion.nombre='$_POST[nombrereputacion3]', reputacion.puntajemin = '$_POST[puntajemin2]', reputacion.puntajemax = '$_POST[puntajemax2]'");
		mysqli_close($link);
		header("location: ./reputacion_form.php?id=correcto3");
	}
	else {
		mysqli_close($link);
		header("location: ./reputacion_form.php?id=incorrecto");
	}
?>