<?php
/* Verifica estado de la sesion (si expiro). */
include_once("../session/verifySession.php");
if(isset($_POST['tarjeta']) && !empty($_POST['tarjeta']) && isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&(strlen($_POST['tarjeta'])==16)){
	$cantidad = $_POST['cantidad'];
	$tiendaid = explode (",",$_POST[pack]); /* Separa el string en partes, usando como delimitador "," (como se pasa la id y el precio como valor por el POST, me quiero quedar con la id). */
	$tiendaid = $tiendaid[0];
	include_once ('../db/connect.php');
	$link = conectar();
	$result=mysqli_query($link, "SELECT precio,cantidad FROM tienda WHERE id=$tiendaid");
	$result=mysqli_fetch_array($result);
	if (mysqli_query($link, "UPDATE credito SET credito.cantidad=credito.cantidad+'$cantidad * $result[cantidad]' WHERE credito.id_usuario='$_SESSION[id]'")){
		mysqli_query ($link, "INSERT INTO compracredito (id_tienda,id_usuario,cantidad,precio,fecha) VALUES ('$_POST[pack]','$_SESSION[id]','$cantidad' * '$result[cantidad]','$cantidad' * '$result[precio]',CURDATE())");
		mysqli_close($link);
		header("location: ./comprar.php?error=0");
	}
	else{
		mysqli_close($link);
		header("location: ./comprar.php?error=2");
	}
}
else
	header("location: ./comprar.php?error=1");
?>