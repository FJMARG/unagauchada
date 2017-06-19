<?php
	include_once ("../session/verifySession.php");
	include_once ("../db/connect.php");
	$link = conectar();
	mysqli_query($link,"INSERT INTO pregunta (id_favor,pregunta,id_usuario_p) VALUES ('$_SESSION[id_favor]','$_POST[pregunta]','$_SESSION[id]')");
	mysqli_close($link);
	header("Location: preguntas.php?error=correcto");
?>