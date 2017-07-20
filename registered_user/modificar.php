<?php
	include_once ("../session/verifySession.php");
	include_once ('../db/connect.php');
	$link = conectar();
	$result = mysqli_query ($link, "SELECT * FROM usuario WHERE id = '$_SESSION[id]'");
	$array = mysqli_fetch_array($result);
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
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
		mysqli_query($link, "UPDATE usuario SET usuario.foto ='$nombretipoimg', usuario.nombre='$_POST[nombre]', usuario.apellido = '$_POST[apellido]', usuario.tel = '$_POST[telefono]', usuario.email = '$_POST[email]' WHERE usuario.id = '$_SESSION[id]'");
		header("location: ./modificar_perfil.php?correcto=1");
		}
		else {
			if(($array['nombre'] != $nombre) or ($array['apellido'] != $apellido) or ($array['email'] != $email) or ($array['tel'] != $telefono)){
				mysqli_query($link, "UPDATE usuario SET usuario.nombre='$_POST[nombre]', usuario.apellido = '$_POST[apellido]', usuario.tel = '$_POST[telefono]', usuario.email = '$_POST[email]' WHERE usuario.id = '$_SESSION[id]'");
				mysqli_close($link);
				header("location: ./modificar_perfil.php?correcto=1");
			}
			else{
				mysqli_close($link);
				header("location: ./modificar_perfil.php?correcto=0");
			}
		}
?>