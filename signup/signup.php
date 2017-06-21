<?php
	include_once ("../db/connect.php");
	$link = conectar ();
    $result = mysqli_query($link, "SELECT * FROM usuario WHERE email = '$_POST[email]'");
    $cant= mysqli_num_rows($result);
	if($cant == 0 && strpos($_POST['email'], "@") != false){
		mysqli_query($link, "INSERT INTO usuario (puntaje,admin,nombre,apellido,email,password,fecnac,tel,foto) VALUES ('0','0','$_POST[nombre]','$_POST[apellido]','$_POST[email]','$_POST[pw]','$_POST[fecha_nac]','$_POST[telefono]','default.png')");
		$result = mysqli_query($link, "SELECT * FROM usuario WHERE email = '$_POST[email]'");
		$array = mysqli_fetch_array($result);
		$userid = $array['id'];
		mysqli_query ($link, "INSERT INTO credito (cantidad,id_usuario) VALUES (1,'$userid')");
		mysqli_close($link);
		header("location: ../index.php?error=0");
	}
	else{
		mysqli_close($link);
		header("location: ./signup_form.php?error=1");	
	}
?>