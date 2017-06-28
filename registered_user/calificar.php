<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Publicar Favor</title> <!-- Titulo de la pagina -->
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico"> <!-- Icono de la web -->
	<?php
		/* Verifica estado de la sesion (si expiro). */
		include_once("../session/verifySession.php");
		/* Navbar */
		include_once("navbar.php");
	?>
		
	<!-- -------------------------------------- Importa los CSS ---------------------------------------- -->
	<link rel="stylesheet" href="/css/w3.css">
	<link rel="stylesheet" href="/css/w3-theme-black.css">
	<!-- ----------------------------------------------------------------------------------------------- -->
	
</head>
<!-- Main -->
<body>
	<div class="w3-main" style="margin-left:350px">
		<div style="margin-right:350px">
			<div class="w3-row w3-padding-64">
				<div class="w3-container">
					<?php
						include_once("../db/connect.php");
						$link = conectar();
						$resultado = mysqli_query($link ,"SELECT * FROM postula WHERE postula.id_favor = '$_GET[id]' and postula.elegido = 1");
						$resultado2 = mysqli_query($link ,"SELECT * FROM favor where id = '$_GET[id]'");
						$favor = mysqli_fetch_array($resultado2);
						$result = mysqli_fetch_array($resultado);
						$user = mysqli_query($link, "SELECT * FROM usuario where id = '$result[id_usuario]'");
						$usuario = mysqli_fetch_array($user);
						mysqli_close($link);
					?>
					<script language= "javascript" src="../js/validarCampoCalificacion.js"></script>
					<div class="w3-border w3-border-orange w3-round-large"><center>
						<form class="w3-form" method="post" action="puntuar.php?id=<?php echo $result['id_favor']; ?>" onsubmit="return validarCalificacion();">
							<p>Titulo de favor: <?php echo $favor['titulo']?></p>
							<p>Postulante: <?php echo $usuario['nombre']." ".$usuario['apellido'];?></p>
							<p>Puntuacion: 
							<SELECT class="w3-round" name="puntuacion" id="puntuacion">
								<option value=0>0</option>
								<option value=1>1</option>
								<option value=-2>-2</option>
							</SELECT>
							</p>
							<p>Comentario: </p>
							<p><textarea class="w3-round" type="text" name="comentario" id="comentario" cols="50" rows="5"></textarea></p>
							<p><button class="w3-btn w3-round">Calificar</button></p></center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>