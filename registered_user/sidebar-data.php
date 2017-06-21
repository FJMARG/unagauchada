<?php
	include_once ("../session/verifySession.php");
?>
<div>
	<a class="w3-bar-item"><center> Bienvenido
		<?php
			include_once ('../db/connect.php');
			$link = conectar();
			$result = mysqli_query ($link, "SELECT * FROM usuario WHERE id = '$_SESSION[id]'");
			$array = mysqli_fetch_array($result);
			/*$result2 = mysqli_query ($link, "SELECT * FROM credito WHERE id_usuario = '$array[id]'");
			$array2= mysqli_fetch_array($result2);*/
			echo $array['nombre']." ".$array['apellido'];
		?>
	</center>
	</a>
	<a id="cred" class="w3-bar-item"></a>
</div>