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
	$result2=mysqli_query($link, "SELECT cantidad FROM credito WHERE id_usuario='$_SESSION[id]'");
	$result2=mysqli_fetch_array($result2);
	if ($result2['cantidad'] < 2147483647){
		if ($result2['cantidad']+$cantidad > 2147483647){
			$cantidad=$cantidad-$result2['cantidad'];
			$exito=3;
		}
		else{
			$exito=2;
		}
		if (mysqli_query($link, "UPDATE credito SET credito.cantidad=credito.cantidad+'$cantidad * $result[cantidad]' WHERE credito.id_usuario='$_SESSION[id]'")){
			$precio=$cantidad*$result[precio];
			mysqli_query ($link, "INSERT INTO compracredito (id_tienda,id_usuario,cantidad,precio,fecha) VALUES ('$_POST[pack]','$_SESSION[id]','$cantidad' * '$result[cantidad]',$precio,CURDATE())");
			mysqli_close($link);
			if ($exito == 3){
				header("location: ./comprar.php?error=".$exito."&cant=".$cantidad."&prec=".$precio);
			}
			else{
				header("location: ./comprar.php?error=0");
			}
		}
		else{
			mysqli_close($link);
			header("location: ./comprar.php?error=2");
		}
	}
	else {
		header("location: ./comprar.php?error=4&cant=0&prec=0");
	}
}
	else
		header("location: ./comprar.php?error=1");
	?>