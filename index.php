<!DOCTYPE html>
<html>
	<head> <!-- Cabecera -->
		<title>Una Gauchada</title> <!-- Titulo de la pagina -->
		<link rel="shortcut icon" type="image/x-icon" href="/image/icono_gauchada.ico"> <!-- Icono de la web -->
		
		<!----------------------------------------Importa los CSS------------------------------------------>
		<link rel="stylesheet" href="/css/w3.css">
		<link rel="stylesheet" href="/css/w3-theme-black.css">
		<!------------------------------------------------------------------------------------------------- -->
		
	</head>
	<body> <!-- Cuerpo -->
		<section> <!-- Seccion -->
			<center> <!-- Centrar texto -->
				<div>
					<img src="/image/Logo.png">
					<br>
					<h3>Inicio de sesi&oacute;n</h3>
				</div>
			</center> <!-- Cierro centrar texto -->
			<div class="w3-main" style="margin-left:350px">
				<div style="margin-right:350px">
					<div class="w3-container">
						<center>
							<?php
								if(isset ($_GET['error']))
									if ($_GET['error']=="1")
										echo "<font color='red'> E-mail  incorrecto y/o contrase&ntilde;a incorrecta. </font>";
									else
										if ($_GET['error']=="0")
											echo "Se ha registrado con exito.";
							?>
							<script language= "javascript" src="/js/validarCamposSesion.js"></script> <!-- Script que valida si existen campos vacios. -->
							<form class="w3-form" method="post" action="/session/login.php" onsubmit="return validar()"> <!-- Inicia el formulario y al accionar llama a la funcion validar() y luego si todo esta bien envia los datos a "verificar.php" -->
								<p><input class="w3-input w3-medium" type="text" name="email" id="email" placeholder="E-mail"></p>
								<p><input class="w3-input w3-medium" type="password" name="pass" id="pass" placeholder="Contrase&ntilde;a"></p>
								<p><button class="w3-btn">Iniciar Sesi&oacute;n</button></p>
							</form> <!-- Termina el formulario -->
							<p>Si no tenes cuenta, <a href="signup/signup_form.php">reg&iacute;strate.</a></p>
						</center>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>