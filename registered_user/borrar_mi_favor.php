<?php
	include_once("../db/connect.php");
	$con = conectar();
	$resultado = mysqli_query($con, "SELECT * from postula where postula.id_favor = '$_GET[id]'");
	$user = mysqli_query($con ,"SELECT * FROM favor where favor.id = '$_GET[id]'");
	$usuario = mysqli_fetch_array($user);
	mysqli_query($con ,"DELETE FROM pregunta WHERE pregunta.id_favor = '$_GET[id]'");
	mysqli_query($con ,"DELETE FROM postula WHERE postula.id_favor = '$_GET[id]'");
	if(mysqli_num_rows($resultado) == 0){
		mysqli_query($con, "UPDATE credito SET credito.cantidad = credito.cantidad + 1 WHERE credito.id_usuario = '$usuario[id_usuario]'");
		mysqli_query($con,"DELETE FROM `favor` WHERE `favor`.`id` = '$_GET[id]'");
		mysqli_close($con);
		header("location: ./mostrar_mis_favores.php?ok=2");
	}else{
		mysqli_query($con,"DELETE FROM `favor` WHERE `favor`.`id` = '$_GET[id]'")or die("no se pudo pipi");
		mysqli_close($con);
		header("location: ./mostrar_mis_favores.php?ok=3");
	}
?>