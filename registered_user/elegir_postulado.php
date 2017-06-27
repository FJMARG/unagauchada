<?php
	if (isset ($_POST ['elegir'])){
		$postyfav = explode ("/",$_POST[elegir]);
		$postulante = $postyfav[0];
		$favor = $postyfav[1];
		echo ($postulante);
		echo ($favor);
		include_once ('../db/connect.php');
		$link = conectar();
		mysqli_query($link,"UPDATE favor SET activo = 0 WHERE id = '$favor'");
		mysqli_query($link,"UPDATE postula SET elegido = 1 WHERE id = '$postulante'");
		mysqli_close($link);
		header ("Location: ./ver_postulantes.php?result=OK");
	}
	else {
		header ("Location: ./ver_postulantes.php?result=BAD");
	}
?>