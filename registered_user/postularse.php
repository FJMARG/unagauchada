<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Favores</title> <!-- Titulo de la pagina -->
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico"> <!-- Icono de la web -->
	<?php
	/* Verifica estado de la sesion (si expiro). */
	include_once("../session/verifySession.php");
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
					<?php 
						include_once ('../db/connect.php');
						$link = conectar();
						$result = mysqli_query($link, "SELECT * FROM favor WHERE favor.id = '$_GET[id]'");
						mysqli_close($link);
						$array = mysqli_fetch_array($result)
					?>
					<center>
					<div class="w3-row-padding">
						<font size=4 face="arial">
							<?php
								include_once("datos.php");
							?>
						<script language= "javascript" src="../js/validarPregunta.js"></script>
						<h3> Descripcion: <h3>
							<form class="w3-form w3-panel w3-round-large" method="post" onsubmit="return validarPregunta();" action="./postular.php" enctype="multipart/form-data" >
							<textarea class="w3-round" type="text" name="pregunta" id="pregunta" cols="50" rows="5"></textarea>
							<br><br>
							<p><button class="w3-btn w3-round">Postularse</button></p>
							</form>
							<form action="./mostrar_favores.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="titulo" value="<?php if (isset($_GET['tit'])) echo $_GET['tit']; ?>">
							<input type="hidden" name="categoria" value="<?php if (isset($_GET['cat'])) echo $_GET['cat']; ?>">
							<input type="hidden" name="localidad" value="<?php if (isset($_GET['loc'])) echo $_GET['loc']; ?>">
							<input type="hidden" name="orden" value="<?php if (isset($_GET['o'])) echo $_GET['o']; ?>">
							<button class="w3-btn w3-round">Volver</button>
							</form>
					</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</body>
</html>