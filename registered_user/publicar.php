<?php
	include_once ("../session/verifySession.php");
	include_once ("../db/connect.php");
	include_once("./verificar_creditos.php");
	if (tieneCreditos()){
		$link = conectar();	
		if (mysqli_query($link, "UPDATE credito SET cantidad = cantidad - 1 WHERE id_usuario='$_SESSION[id]'")){
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
				mysqli_query($link, "INSERT INTO favor (titulo,descripcion,fechalimite,ciudad,id_usuario,id_categoria,activo,foto) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[fecha]','$_POST[localidad]','$_SESSION[id]','$_POST[categoria]',1,'$nombretipoimg')");
			}
			else {
				mysqli_query($link, "INSERT INTO favor (titulo,descripcion,fechalimite,ciudad,id_usuario,id_categoria,activo,foto) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[fecha]','$_POST[localidad]','$_SESSION[id]','$_POST[categoria]',1,'default.png')");
			}
			mysqli_close($link);
			header("location: ./publicar_form.php?error=0");
		}
		else{
			mysqli_close($link);
			header("location: ./publicar_form.php?error=2");
		}
	}
	else
		header("location: ./publicar_form.php?error=1");
?>