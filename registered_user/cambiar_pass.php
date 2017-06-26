<?php 
	include_once("../db/connect.php");
	include_once("../session/verifySession.php");
	$link = conectar();
	mysqli_query($link ,"UPDATE usuario SET usuario.password = '$_POST[pw]' Where usuario.id = '$_SESSION[id]'");
	mysqli_close($link);
	header("location: ./modificar_perfil.php?correcto=1");
?>