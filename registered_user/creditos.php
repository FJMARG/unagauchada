<?php 
	include_once ('../db/connect.php');
	$link = conectar();
	$result = mysqli_query ($link, "SELECT * FROM usuario WHERE id = '$_POST[id]'");
	$array = mysqli_fetch_array($result);
	$result2 = mysqli_query ($link, "SELECT * FROM credito WHERE id_usuario = '$array[id]'");
	$array2= mysqli_fetch_array($result2);
	echo $array2['cantidad'];
?>