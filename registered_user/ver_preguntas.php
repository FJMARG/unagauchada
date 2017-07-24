<div class='w3-card-2 w3-light-orange w3-round-large'>
	<?php 
	include_once ('../db/connect.php');
	$link = conectar();
	$user = mysqli_query($link,"SELECT nombre,apellido FROM usuario WHERE usuario.id = '$preguntas[id_usuario_p]'");
	$arreglo = mysqli_fetch_array($user);
	echo '<br><i><font size=5>'.$preguntas['pregunta'].'</font></i><br>';
	echo '-'.$arreglo['nombre']." ".$arreglo['apellido'].'<br>'.'<br>';
	if($dueño['id'] == $_SESSION['id'] and is_null($preguntas['respuesta'])) { ?>
		<form class="w3-form w3-panel w3-round-large" method="post" onsubmit="return validarPregunta();" action="./responder.php?id=<?php echo $preguntas['id'];?>" enctype="multipart/form-data">
			<textarea class="w3-round" type="text" name="pregunta" id="pregunta" cols="55" rows="2"></textarea>
			<br><br>
			<button class="w3-btn w3-round">Responder</button><br><br>
		</form>
	<?php }elseif (!is_null($preguntas['respuesta'])){
		echo 'Respuesta:'.'<br>';
		echo '<i>'.$preguntas['respuesta'].'</i><br>'.'<br>';
	} ?>
</div><br><br>