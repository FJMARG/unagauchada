<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Preguntas</title> <!-- Titulo de la pagina -->
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
<body>
	<div class="w3-main" style="margin-left:350px">
		<div style="margin-right:350px">
			<div class="w3-padding-64">
					<div class="w3-row-padding ">
						<font size=4 face="arial">
							<center>
								<?php include_once('datos.php'); ?> 
							</center>
						</font>
					</div>
				<script language= "javascript" src="../js/validarPregunta.js"></script>
				<center>
					<br>
					<form action="./favores.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="titulo" value="<?php if (isset($_GET['tit'])) echo $_GET['tit']; ?>">
						<input type="hidden" name="categoria" value="<?php if (isset($_GET['cat'])) echo $_GET['cat']; ?>">
						<input type="hidden" name="localidad" value="<?php if (isset($_GET['loc'])) echo $_GET['loc']; ?>">
						<input type="hidden" name="orden" value="<?php if (isset($_GET['o'])) echo $_GET['o']; ?>">
						<input type="hidden" name="owner" value="<?php if (isset($_GET['owner'])) echo $_GET['owner']; ?>">
						<button class="w3-btn w3-round">Volver</button>
					</form>
					<!-- Se muestra un mensaje de error si no hay preguntas en ese favor , si las hay las muestra debajo del h1 de preguntas.-->
					<h1>Preguntas</h1><br><br>
					<?php
						if(mysqli_num_rows($result2) == 0) {
							echo 'No se realizaron preguntas en este favor. <br><br>';
						}
						else{
							while ($preguntas = mysqli_fetch_array($result2)){?>
								<?php include('ver_preguntas.php');
							}
						}
						/*En este if se pregunta si el usuario de la sesion iniciada es el propio dueño del favor, en caso de no serlo puede realizar una pregunta.*/
						if(($favor['id_usuario'] != $_SESSION['id']) and $favor['activo'] == 1){ ?>
							<h3> Realizar Pregunta: <h3>
							<form class="w3-form w3-panel w3-round-large" method="post" onsubmit="return validarPregunta();" action="./preguntar.php" enctype="multipart/form-data" >
							<textarea class="w3-round" type="text" name="pregunta" id="pregunta" cols="55" rows="5"></textarea>
							<br><br>
							<input type="hidden" name="titulo" value="<?php if (isset($_GET['tit'])) echo $_GET['tit']; ?>">
							<input type="hidden" name="categoria" value="<?php if (isset($_GET['cat'])) echo $_GET['cat']; ?>">
							<input type="hidden" name="localidad" value="<?php if (isset($_GET['loc'])) echo $_GET['loc']; ?>">
							<input type="hidden" name="orden" value="<?php if (isset($_GET['o'])) echo $_GET['o']; ?>">
							<input type="hidden" name="owner" value="<?php if (isset($_GET['owner'])) echo $_GET['owner']; ?>">
							<p><button class="w3-btn w3-round">Preguntar</button></p>
							</form>
						<?php 
						}
						?>
				</center>
			</div>
		</div>
	</div>
</body>
</html>