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
					<center><p><h2>Modificar Contraseña</h2></p>
					<script language= "javascript" src="../js/validarPassword.js"></script>
					<form class="w3-form w3-panel w3-border w3-border-orange w3-round-large" method="post" action="./cambiar_pass.php" onsubmit="return validar()">
						<p><input class="w3-input" type="password" name="pw" id="pw" placeholder="Contraseña"></p>
						<p><input class="w3-input" type="password" name="cpw" id="cpw" placeholder="Confirmar Contraseña"></p>
						<button class="w3-btn w3-round" >Modificar</button></center>
				</div>
			</div>
		</div>
	</div>
</body>
</html>