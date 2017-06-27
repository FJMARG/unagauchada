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
					<center><h1 class="w3-theme-black">Datos de tu perfil</h1></center>
					<script language= "javascript" src="../js/validarPostulante.js"></script>
					<?php
						if (isset ($_GET['result'])){
							if (($_GET['result'])=='OK'){
								echo "<font color='green'> La operacion se realizo con exito. </font>";
							}
							else {
								echo "<font color='red'> No se pudo completar la operacion. </font>";
							}
						}
					?>
						<form action="./elegir_postulado.php" method="post" onsubmit="return validar();">
					<?php
						include_once ('../db/connect.php');
						$link = conectar();
						$consulta = "SELECT favor.titulo, favor.id AS idfavor, usuario.nombre, usuario.apellido, usuario.puntaje, usuario.id AS idusuario, postula.id AS idpostula FROM usuario INNER JOIN postula ON (usuario.id = postula.id_usuario) INNER JOIN favor ON (postula.id_favor = favor.id) WHERE favor.id_usuario = '$_SESSION[id]' AND postula.elegido = 0 AND CURDATE() <= fechalimite AND activo = 1 ORDER BY favor.titulo";
						$result = mysqli_query($link,$consulta);
						$titulo = "|/|\|/|\|/|\|/|"; /* String inusual para titulo de favor */
						while ($array = mysqli_fetch_array($result)){
							if ($titulo != $array ['titulo']){	/* Condicion para que no repita el titulo del favor. */
								$titulo = $array ['titulo'];
								echo ("<p>Titulo del Favor: ".$titulo."</p>");
							}
							echo ("<a>Nombre y apellido del postulante: </a>");
							echo ("<a href='./ver_perfil.php?id=".$array['idusuario']."'>".$array['nombre']." ".$array['apellido']."</a>");
							echo ("<p>Puntaje: ".$array['puntaje']."</p>"); ?>
							<p><button class="w3-btn w3-round" name="elegir" value="<?php echo ($array['idpostula']."/".$array['idfavor']); ?>">Elegir postulante</button></p>
							<?php
						}	?>
						</form>
					<?php
						mysqli_close($link);
					?>
				</div>
			</div>
		</div>
	</div>
	<div id="footer" class="w3-grey">
		<br>
		<center><font  size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>
</body>
</html>