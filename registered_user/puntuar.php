<?php
	include_once("../db/connect.php");
	include_once("../session/verifySession.php");
	$connect = conectar();
	$resultado = mysqli_query($connect ,"SELECT * FROM postula WHERE postula.id_favor = '$_GET[id]' and postula.elegido = 1");
	$result = mysqli_fetch_array($resultado);
	$user = mysqli_query($connect, "SELECT * FROM usuario where id = '$result[id_usuario]'");
	$usuario = mysqli_fetch_array($user);
	mysqli_query($connect, "INSERT INTO calificacion (id_usuario_c , id_usuario_r , calificacion , id_favor , comentario) VALUES ('$_SESSION[id]','$usuario[id]','$_POST[puntuacion]','$_GET[id]','$_POST[comentario]')")or die("no funciono pipi");
	mysqli_query($connect, "UPDATE usuario SET puntaje = puntaje + '$_POST[puntuacion]' where id = $usuario[id]");
	mysqli_close($connect);
	header("location: ./calificar_favores.php?id=correcto");
?>