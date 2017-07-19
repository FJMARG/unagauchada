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