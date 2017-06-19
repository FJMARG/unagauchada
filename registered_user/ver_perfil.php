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
	<div class="w3-main">
		<div class="w3-padding-64">
			<div class="w3-container" style="margin-left:350px">
				<div style="margin-right:350px">
						<?php
							include_once ('../db/connect.php');
							$link = conectar();
							$user = mysqli_query($link ,"SELECT * from usuario where usuario.id = '$_GET[id]'");
							$datos = mysqli_fetch_array($user);
							mysqli_close($link);
						?>
						<img align="right" class="w3-round" src='/image/favor/<?php echo "$datos[foto]"; ?>' width="300" height="300"/>
						<br><br>
						<center>
						<p align="center"><h3><?php echo $datos['nombre']." ".$datos['apellido']; ?></h3></p>
						<p align="center"><h3><?php echo $datos['email']; ?></h3></p>
						<p align="center"><h3><?php echo $datos['fecnac']; ?></h3></p>
						<p align="center"><h3><?php echo $datos['tel']; ?></h3></p>
						</center>
				</div>
			</div>
		</div>	
	</div>	
</body>
</html>