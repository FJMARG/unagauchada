<?php
	include_once("../db/connect.php");
	$link = conectar();
	$resultado = mysqli_query($link , "SELECT * from reputacion where nombre LIKE '$_POST[nombrereputacion]'");
	if(mysqli_num_rows($resultado) == 0){
		mysqli_query($link, "INSERT into reputacion (nombre,imagen,puntajemin,puntajemax) values ('$_POST[nombrereputacion]','','$_POST[puntajemin]','$_POST[puntajemax]')");
		mysqli_close($link);
		header("location: ./reputacion_form.php?id=correcto");
	}else{
		mysqli_close($link);
		header("location: ./reputacion_form.php?id=incorrecto");
	}
?>