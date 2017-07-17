<?php

	include_once ("../session/verifySession.php");
	include_once ('../db/connect.php');
	$link = conectar();
	$result = mysqli_query ($link, "SELECT * FROM favor WHERE id = '$_GET[id]'");
	$array = mysqli_fetch_array($result);
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$ciudad = $_POST['ciudad'];
	$categoria = $_POST['categoria'];
	$fecha_limite = $_POST['fecha'];
	$id = $_GET['id'];
	if(!(empty($_FILES['foto']['tmp_name'])) && (file_exists($_FILES['foto']['tmp_name']))) {
		$archivo=$_FILES['foto']['tmp_name'];
		$ruta = "../image/favor/".$_FILES['foto']['name'];
		$extension=explode ("/",$_FILES['foto']['type']); /* Exploto el string "image/jpg" (o el tipo que sea) en varias partes usando delimitador "/" y se guarda en un arreglo. */
		$extension=$extension[1]; /* Selecciono la segunda parte (jpg, bmp, o como se llame). */
		move_uploaded_file($archivo, $ruta); /* Muevo el archivo subido a la ruta */
		date_default_timezone_set('America/Argentina/Buenos_Aires'); /* Setea la zona horaria de Buenos Aires, Argentina */
		$fechayhora=date("d-m-Y_H,i,s");	/* Almacena la hora en el formato indicado. */
		$nombretipoimg=$fechayhora.".".$extension; /* Concateno la fecha con la extension del archivo (Este sera el nombre del archivo). */
		rename($ruta , "../image/favor/".$nombretipoimg); /* Renombro el archivo por el nombre indicado arriba. */
		mysqli_query($link, "UPDATE favor SET favor.foto ='$nombretipoimg', favor.titulo='$titulo', favor.descripcion = '$descripcion', favor.id_categoria = '$categoria' , favor.ciudad = '$ciudad', favor.fechalimite = '$fecha_limite' WHERE favor.id = '$id'");
		header("location: ./modificar_favor.php?id=$id&correcto=1");
		}
		else {
			if(($array['titulo'] != $titulo) or ($array['id_categoria'] != $categoria) or ($array['ciudad'] != $ciudad) or ($array['descripcion'] != $descripcion) or ($array['fechalimite'] != $fecha_limite)){

				mysqli_query($link, "UPDATE favor SET favor.titulo='$titulo', favor.descripcion = '$descripcion', favor.ciudad = '$ciudad', favor.id_categoria = '$categoria' , favor.fechalimite = '$fecha_limite' WHERE favor.id = '$id'");
				header("location: ./modificar_favor.php?id=$id&correcto=1");
			}
			else{
				header("location: ./modificar_favor.php?id=$id&correcto=0");
			}
		}
?>