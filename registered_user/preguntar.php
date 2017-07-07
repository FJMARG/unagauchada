<?php
	include_once ("../session/verifySession.php");
	include_once ("../db/connect.php");
	$link = conectar();
	mysqli_query($link,"INSERT INTO pregunta (id_favor,pregunta,id_usuario_p) VALUES ('$_SESSION[id_favor]','$_POST[pregunta]','$_SESSION[id]')");
	mysqli_close($link);
	$filtros="";
	if (isset($_POST['titulo']) && !empty($_POST['titulo'])){
		$filtros=$filtros."&tit=".$_POST['titulo'];
	}
	if (isset($_POST['categoria']) && !empty($_POST['categoria'])){
		$filtros=$filtros."&cat=".$_POST['categoria'];
	}
	if (isset($_POST['localidad']) && !empty($_POST['localidad'])){
		$filtros=$filtros."&loc=".$_POST['localidad'];
	}
	if (isset($_POST['orden']) && !empty($_POST['orden'])){
		$filtros=$filtros."&o=".$_POST['orden'];
	}
	if (isset($_POST['owner']) && !empty($_POST['owner'])){
		$filtros=$filtros."&owner=".$_POST['owner'];
	}
	header("Location: preguntas.php?error=correcto".$filtros);
?>