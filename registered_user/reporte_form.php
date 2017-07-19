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
						<center><h1 class="w3-theme-black">Reporte de ganancias</h1><br>
						<script language="javascript" src="../js/validarReporteGanancias.js"></script>
						<form class="w3-form w3-panel w3-border w3-border-orange w3-round-large" method="post" enctype="multipart/form-data" action="./generar_reporte.php" onsubmit="return validarReporte();"><br>	
							<p>Fecha de inicio: <input class="w3-round" type="date" name="fechainicio" id="fechainicio"></p>
							<p>Fecha final:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="w3-round" type="date" name="fechafinal" id="fechafinal"></p>
							<br>
							<button class="w3-button w3-black w3-round-large">Buscar</button></center>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div id="footer" class="w3-light-orange" style="position: fixed; bottom: 0; width: 100%; height: 10%;">
		<br>
		<center><font size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>
</body>
</html>