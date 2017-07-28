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
						<script language= "javascript" src="../js/validarCamposRegistro.js"></script>
						<div class="w3-panel w3-border w3-border-orange w3-round-large">
							<form class="w3-form" method="post" enctype="multipart/form-data" action="./modificar.php" onsubmit="return validar()">
								<?php
									include_once("../db/connect.php");
									$link = conectar();
									$resultado = mysqli_query($link,"SELECT * FROM usuario Where usuario.id = '$_SESSION[id]'");
									$array = mysqli_fetch_array($resultado);
									if (isset ($_GET['correcto']) and ($_GET['correcto'] == 1)){
										echo "<font color='green'><center> Cambios realizados. </center></font>";
									}
									elseif (isset ($_GET['correcto']) and ($_GET['correcto'] == 0)) {
										echo "<font color='red'><center> No cambiaste ningun campo. </center></font>";
									}
									elseif (isset ($_GET['correcto']) and ($_GET['correcto'] == 2)) {
										echo "<font color='red'><center> Ese email ya esta en uso. </center></font>";
									}
								?>
								<br>
								<p><input class="w3-input" type="text" name="nombre" id="nombre" value="<?php echo $array['nombre']; ?>"></p>
								<p><input class="w3-input" type="text" name="apellido" id="apellido" value="<?php echo $array['apellido']; ?>"></p>
								<p><input class="w3-input" type="tel" name="telefono" id="telefono" value="<?php echo $array['tel']; ?>" pattern="[0-9]{10}"></p>
								<p><input class="w3-input" type="email" name="email" id="email" value="<?php echo $array['email']; ?>"></p><p id="rta"></p>
								<p>Cambiar foto: <input class="w3-round" type="file" name="foto" id="foto"></p>
								<center><button class="w3-btn w3-round" >Modificar</button>
							</form>
							<p><a href="modificar_pass.php" class="w3-btn w3-round">Cambiar Contraseña</a></p></center><br>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer" class="w3-light-orange">
		<br>
		<center><font  size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>
</body>
</html>