<?php
	include_once ('../db/connect.php');
	$link = conectar();
		mysqli_query($link, "UPDATE reputacion SET reputacion.nombre='$_POST[nombrereputacion3]', reputacion.puntajemin = '$_POST[puntajemin2]', reputacion.puntajemax = '$_POST[puntajemax2]' WHERE id = '$_POST[idreputacion]'");
		mysqli_close($link);
		header("location: ./reputacion_form.php?id=correcto3");
?>