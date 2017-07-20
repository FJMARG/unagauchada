<?php
	include_once("../db/connect.php");
	$link = conectar();
	$resultado = mysqli_query($link , "SELECT * from categoria where nombre LIKE '$_POST[categoria1]'");
	if(mysqli_num_rows($resultado) == 0){
		mysqli_query($link, "INSERT into categoria (nombre) values ('$_POST[categoria1]')");
		mysqli_close($link);
		header("location: ./categoria_form.php?id=correcto");
	}else{
		mysqli_close($link);
		header("location: ./categoria_form.php?id=incorrecto");
	}
?>