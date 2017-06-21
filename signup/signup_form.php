<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Registro</title> <!-- Titulo de la pagina -->
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico"> <!-- Icono de la web -->
			
	<!-- -------------------------------------- Importa los CSS ---------------------------------------- -->
	<link rel="stylesheet" href="/css/w3.css">
	<link rel="stylesheet" href="/css/w3-theme-black.css">
	<!-- ----------------------------------------------------------------------------------------------- -->
		
</head>
<body>
	<div style="margin-left:350px">
		<div style="margin-right:350px">
			<div class="w3-row w3-padding-64">
				<div class="w3-container ">
					<center><img src="/image/Logo.png">
					<h1 class="w3-theme-black">Registro</h1></center><br>
					<?php
						if ((isset($_GET['error'])) and ($_GET['error']=1))
							echo "<font color='red'> El Email ingresado se encuentra en uso o no es v&aacute;lido.</font>";
					?>
					<script language= "javascript" src="../js/jquery-3.2.1.js"></script>
					<script language= "javascript" src="../js/email-status.js"></script>
					<script language= "javascript" src="../js/validarCamposRegistro.js"></script>
					<form class="w3-form w3-panel w3-border w3-border-orange w3-round-large" method="post" action="./signup.php" onsubmit="return validar()">
						<br>
						<p>Fecha de nacimiento: <input type="date" name="fecha_nac" id="fecha_nac"></p>
						<p><input class="w3-input" type="text" name="nombre" id="nombre" placeholder="Nombre"></p>
						<p><input class="w3-input" type="text" name="apellido" id="apellido" placeholder="Apellido"></p>
						<p><input class="w3-input" type="tel" name="telefono" id="telefono" placeholder="Telefono (10 digitos)" pattern="[0-9]{10}"></p>
						<p><input class="w3-input" type="email" name="email" id="email" placeholder="Email"></p><p id="rta"></p>
						<p><input class="w3-input" type="password" name="pw" id="pw" placeholder="Contraseña"></p>
						<p><input class="w3-input" type="password" name="cpw" id="cpw" placeholder="Confirmar Contraseña"></p>
						<center><button class="w3-btn w3-round" >Registrar</button></center>
					</form>
					<center><button class="w3-btn w3-round" onclick = "location='../index.php'">Volver a Inicio</button></center>
				</div>
			</div>
		</div>
	</div>
</body>
</html>