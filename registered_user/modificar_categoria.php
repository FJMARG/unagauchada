<?php
	include_once("../db/connect.php");
	$link = conectar();
	$nuevo = $_POST['categoria4'];
	$viejo = $_POST['categoria3'];
	$resulta2 = mysqli_query($link ,"SELECT * FROM categoria WHERE nombre like '$nuevo'");
	if(mysqli_num_rows($resulta2) == 0){
		mysqli_query($link, "UPDATE categoria SET categoria.nombre = '$nuevo' WHERE categoria.nombre = '$viejo'");
		header("location: ./categoria_form.php?id=correcto3");
		mysqli_close($link);
	}else{
		header("location: ./categoria_form.php?id=incorrecto2");
		mysqli_close($link);
	}
?>