<?php
	include_once ("../session/verifySession.php");
	include_once ("../db/connect.php");
	$link = conectar();
	/* Se inserta la postulacion con el id del favor , usuario , descripcion y fecha*/
	mysqli_query($link,"INSERT INTO postula (id_favor,id_usuario,descripcion,fecha,elegido) VALUES ('$_SESSION[id_favor]','$_SESSION[id]','$_POST[pregunta]','CURDATE()', '0')");
	mysqli_close($link);
	header("Location: favores.php?id=correcto");
?>