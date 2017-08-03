<?php
	include_once("../db/connect.php");
	$conexion = conectar();
	mysqli_query($conexion,"DELETE FROM `reputacion` WHERE reputacion.id = '$_POST[idreputacion2]'");
	mysqli_close($conexion);
	header("location: ./reputacion_form.php?id=correcto2");
?>