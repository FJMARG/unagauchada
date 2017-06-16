<div class='w3-card-2 w3-light-orange'>
	<?php 
	include_once ('../db/connect.php');
	$link = conectar();
	$user = mysqli_query($link,"SELECT nombre FROM usuario WHERE usuario.id = '$preguntas[id_usuario_p]'");
	$arreglo = mysqli_fetch_array($user);
	echo $preguntas['pregunta'].'<br>';
	echo '-'.$arreglo['nombre'];
	?>
</div><br><br>