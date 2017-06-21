<?php
if (isset($_POST['correo'])){
	if (strpos($_POST['correo'], "@") != false){
		include_once ("../db/connect.php");
		$link = conectar ();
		$result = mysqli_query($link, "SELECT * FROM usuario WHERE email = '$_POST[correo]'");
		$cant= mysqli_num_rows($result);
		echo $cant;
	}
}
?>