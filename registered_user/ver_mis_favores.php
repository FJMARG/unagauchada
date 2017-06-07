<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Favores</title>
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico">
	<?php
	include_once("../session/verifySession.php");
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
						if (isset ($_GET['error']) and ($_GET['error'] == "1"))
							echo "<font color='red'> No tienes los suficientes creditos para publicar un favor. </font>";
					?>
					<h1 class="w3-text-teal">Favores</h1>
					<center><form method="POST" action="buscar_favores.php"> 
					Palabra clave: <input class="w3-round" type="text" name="palabra" size="20"><br><br> 
					<button class="w3-btn w3-round">Buscar</button>
					</form></center>
					<div class="w3-row-padding">
					<?php
						include_once ('../db/connect.php');
						$link = conectar();
						$result = mysqli_query($link,"SELECT * FROM favor WHERE id_usuario = '$_SESSION[id]'"); 
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