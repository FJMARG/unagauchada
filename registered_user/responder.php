<?php
	include_once("../session/verifySession.php");
	include_once ('../db/connect.php');
	$link = conectar();
	mysqli_query($link ,"UPDATE pregunta SET pregunta.respuesta = '$_POST[respuesta]' Where pregunta.id = '$_GET[id]'");
	header("location: ./preguntas.php?error=correcto2");
?>