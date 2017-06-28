<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Favores</title>
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico">
	<?php
	include_once("../session/verifySession.php");
	include_once("navbar.php");
	?>
		
	<!-- -------------------------------------- Importa los CSS ---------------------------------------- -->
	<link rel="stylesheet" href="/css/w3.css">
	<link rel="stylesheet" href="/css/w3-theme-black.css">
	<!-- ----------------------------------------------------------------------------------------------- -->
	
</head>
<body>
	<div class="w3-main" style="margin-left:350px">
		<div style="margin-right:350px">
			<div class="w3-padding-64">
				<div class="w3-container">
					<center><h2>Historial de calificaciones</h2></center>
					<?php
						include_once("../db/connect.php");
						$con = conectar();
						$resultado = mysqli_query($con ,"SELECT * FROM calificacion WHERE id_usuario_r = '$_SESSION[id]' ORDER BY id desc");
						if(mysqli_num_rows($resultado) != 0){
							while ($calificaciones = mysqli_fetch_array($resultado)){
								$user = mysqli_query($con,"SELECT * FROM usuario where id = '$calificaciones[id_usuario_c]'");
								$usuario_r = mysqli_fetch_array($user);
								$fav = mysqli_query($con,"SELECT * FROM favor where id = '$calificaciones[id_favor]'");
								$favor = mysqli_fetch_array($fav);
								?>
								<div class="w3-panel w3-border w3-border-orange w3-round-large">
									<p>Calificado por: <?php echo $usuario_r['nombre']." ".$usuario_r['apellido'];?></p>
									<p>Favor realizado: <?php echo $favor['titulo'];?></p>
									<p>Comentario: <?php echo $calificaciones['comentario'];?></p>
									<p>Puntuacion: <?php echo $calificaciones['calificacion'];?></p>
								</div>
								<br>
						<?php
						}
						mysqli_close($con);
						}else{
							echo "<br><center>No tienes calificaciones.</center>";
						}?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>