<?php
		include_once ('../db/connect.php');
		$link = conectar();
		if(isset($_GET['id'])){
			$_SESSION['id_favor'] = $_GET['id'];
		}
		$result1 = mysqli_query($link, "SELECT * FROM favor WHERE favor.id = '$_SESSION[id_favor]'");
		$favor = mysqli_fetch_array($result1);
		$result2 = mysqli_query($link, "SELECT * FROM pregunta WHERE pregunta.id_favor = '$favor[id]'");
		$result3 = mysqli_query ($link, "SELECT * FROM usuario WHERE usuario.id = '$favor[id_usuario]'");
		$result4 = mysqli_query ($link, "SELECT * FROM categoria WHERE categoria.id = '$favor[id_categoria]'");
		$dueño = mysqli_fetch_array($result3);
		$categoria = mysqli_fetch_array($result4);
		mysqli_close($link);
		if (isset ($_GET['error']) and ($_GET['error'] == "correcto")){
			echo "<center><font color='green'> Pregunta realizada. </font></center>";
		}else{
			if (isset ($_GET['error']) and ($_GET['error'] == "incorrecto")){
				echo "<center><font color='red'> Debe rellenar el campo de pregunta. </font></center>";
			}
		}
	?>