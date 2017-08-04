<?php
	include_once("../db/connect.php");
	$link = conectar();
	foreach ($_POST['idusuario'] as $usuario){
		$id = explode("-",$usuario);
		if ($id[1]==="1")
			$sql = "UPDATE usuario SET admin = '0' WHERE id = '$id[0]'";
		else
			$sql = "UPDATE usuario SET admin = '1' WHERE id = '$id[0]'";
		mysqli_query ($link,$sql);
		$cant = $cant + mysqli_affected_rows($link);
	}
	mysqli_close($link);
	header("location: privilegios.php?ok=1&cant=".$cant);
?>