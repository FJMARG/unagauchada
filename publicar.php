<?php
	include_once ("../session/verifySession.php");
	include_once ("../db/connect.php");
	include_once("./verificar_creditos.php");
	if (tieneCreditos()){
		$link = conectar();	
		if (mysqli_query($link, "UPDATE credito SET cantidad = cantidad - 1 WHERE id_usuario='$_SESSION[id]'")){
			if(!(empty($_FILES['foto']['tmp_name'])) && (file_exists($_FILES['foto']['tmp_name']))) {
				$nombreimg=$_FILES['foto']['name'];
				$archivo=$_FILES['foto']['tmp_name'];
				$tipo=$_FILES['foto']['type'];
				$ruta = "../image/".$nombreimg;
				move_uploaded_file($archivo, $ruta);
				mysqli_query($link, "INSERT INTO favor (titulo,descripcion,fechalimite,ciudad,id_usuario,id_categoria,activo,foto) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[fecha]','$_POST[ciudad]','$_SESSION[id]','$_POST[categoria]',1,'".$ruta."')");
			}
			else {
				$ruta = "../image/Logo.png";
				mysqli_query($link, "INSERT INTO favor (titulo,descripcion,fechalimite,ciudad,id_usuario,id_categoria,activo,foto) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[fecha]','$_POST[ciudad]','$_SESSION[id]','$_POST[categoria]',1,'".$ruta."')");
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