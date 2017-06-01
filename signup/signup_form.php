<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Registro</title> <!-- Titulo de la pagina -->
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico"> <!-- Icono de la web -->
	<link href="../style.html" rel="import" /> <!-- Importa los CSS -->
</head>
<body>
	<br>
	<center>
		<font size="6" face="lucida handwriting">Una Gauchada</font>
	</center>
	<div class="w3-main" style="margin-left:350px">
		<div style="margin-right:350px">
			<div class="w3-row w3-padding-64">
				<div class="w3-container">
					<?php
						if ((isset($_GET['error'])) and ($_GET['error']=1))
							echo "<font color='red'> El Email ingresado se encuentra en uso.</font>";
					?>
					<script language= "javascript" src="../js/validarCamposRegistro.js"></script>
					<form class="w3-form" method="post" action="./signup.php" onsubmit="return validar()">
						<h3>Registro</h3>
						<br>
						<p>Fecha de nacimiento: <input type="date" name="fecha_nac" id="fecha_nac"></p>
						<p><input class="w3-input" type="text" name="nombre" id="nombre" placeholder="Nombre"></p>
						<p><input class="w3-input" type="text" name="apellido" id="apellido" placeholder="Apellido"></p>
						<p><input class="w3-input" type="tel" name="telefono" id="telefono" placeholder="Telefono (10 digitos)" pattern="[0-9]{10}"></p>
						<p><input class="w3-input" type="email" name="email" id="email" placeholder="Email"></p>
						<p><input class="w3-input" type="password" name="pw" id="pw" placeholder="Contraseña"></p>
						<p><input class="w3-input" type="password" name="cpw" id="cpw" placeholder="Confirmar Contraseña"></p>
						<button class="w3-btn">Registrar</button>
					</form>
					<button class="w3-btn" onclick = "location='../index.php'">Volver a Inicio</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>