<?php
include_once ("../db/connect.php");
$link = conectar ();
if (isset($_POST['id'])){
	if (isset($_POST['nombre']) && isset($_POST['puntajemin']) && isset($_POST['puntajemax'])){
		$result = mysqli_query($link, "SELECT * FROM reputacion WHERE puntajemin <= '$_POST[puntajemax]' AND puntajemax >= '$_POST[puntajemin]' AND id != '$_POST[id]'");
		$cant= mysqli_num_rows($result);
		if ($cant > 0){
			echo 1; /* Modificar: puntajes pisan otro rango. */
		}
		else {
			$resultado = mysqli_query($link, "SELECT * FROM reputacion WHERE id = '$_POST[id]'");
			$row = mysqli_fetch_array($resultado);
			$puntajemin = $row['puntajemin']-1;
			$puntajemax = $row['puntajemax']+1;
			$result2 = mysqli_query($link, "SELECT * FROM reputacion WHERE puntajemax = $puntajemin AND id != '$_POST[id]'");
			$cant2 = mysqli_num_rows($result2);
			$result3 = mysqli_query($link, "SELECT * FROM reputacion WHERE puntajemin = $puntajemax AND id != '$_POST[id]'");
			$cant3 = mysqli_num_rows($result3);
			if (($cant2 > 0) && ($cant3 > 0) && ($_POST['puntajemin'] != $row['puntajemin']) && ($_POST['puntajemax'] != $row['puntajemax']))
				echo 2; /* Queda un espacio adelante y atras del rango. */
			else if (($cant2 > 0) && ($_POST['puntajemin'] != $row['puntajemin']))
				echo 3; /* Queda un espacio atras del rango. */
			else if (($cant3 > 0) && ($_POST['puntajemax'] != $row['puntajemax']))
				echo 4; /* Queda un espacio adelante del rango. */
		}
	}
	else{
		$result = mysqli_query($link, "SELECT * FROM reputacion WHERE id = '$_POST[id]'");
		$row = mysqli_fetch_array($result);
		$puntajemax = $row["puntajemax"]+1;
		$result2 = mysqli_query($link, "SELECT id FROM reputacion WHERE puntajemin = $puntajemax");
		$cant = mysqli_num_rows($result2);
		if ($cant > 0){
			echo 1; /* Eliminar: producira un espacio vacio. */
		}
	}
}
else {
	$result = mysqli_query($link, "SELECT id FROM reputacion WHERE nombre = '$_POST[nombre]'");
	$cant= mysqli_num_rows($result);
	if ($cant > 0){
		echo 1; /* Agregar: nombre de reputacion ya existe. */
	}
	else {
		$result = mysqli_query($link, "SELECT * FROM reputacion WHERE puntajemin <= '$_POST[puntajemax]' AND puntajemax >= '$_POST[puntajemin]'");
		$cant= mysqli_num_rows($result);
		if ($cant > 0){
			echo 2; /* Agregar: puntajes pisan otro rango. */
		}
		else {
			$puntajemin = $_POST["puntajemin"]-1;
			$result2 = mysqli_query($link, "SELECT * FROM reputacion WHERE puntajemax = $puntajemin");
			$cant2 = mysqli_num_rows($result2);
			if ($cant2 == 0){
				echo 3; /* Agregar: no pueden quedar espacios vacios. */
			}
		}
	}
	mysqli_close($link);
}
?>