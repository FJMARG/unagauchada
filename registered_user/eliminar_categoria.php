<?php
	include_once("../db/connect.php");
	$conexion = conectar();
	$result = mysqli_query($conexion ,"SELECT * FROM categoria WHERE categoria.nombre = 'Otros'");
	$arreglo = mysqli_fetch_array($result);
	mysqli_query($conexion,"UPDATE favor SET favor.id_categoria = '$arreglo[id]' where favor.id_categoria = '$_POST[categoria2]'");
	mysqli_query($conexion,"DELETE FROM `categoria` WHERE `categoria`.`id` = '$_POST[categoria2]'");
	header("location: ./categoria_form.php?id=correcto2");
?>