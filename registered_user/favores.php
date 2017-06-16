<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Favores</title> <!-- Titulo de la pagina -->
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
				<div class="w3-container">
					<?php
						if (isset ($_GET['id']) and ($_GET['id'] == "incorrecto"))
							echo "<font color='red'> No se ingreso ninguna referencia. </font>"
					?>
					<center><h1 class="w3-theme-black">Favores</h1><br>
					<form method="POST" action="buscar_favores.php"> 
					Palabra clave: <input class="w3-round" type="text" name="palabra" size="20"><br><br> 
					<button class="w3-btn w3-round">Buscar</button>
					</form></center>
					<div class="w3-row-padding">
						<?php
							include_once ('../db/connect.php');
							$link = conectar();
							$result = mysqli_query($link, "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) ORDER BY fechalimite");
							mysqli_close($link);
							include_once("mostrar_favores.php");
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>