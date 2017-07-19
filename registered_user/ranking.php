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
						<center><h1 class="w3-theme-black">Ranking de usuario</h1><br>
							<table class="w3-table w3-round w3-striped w3-centered">
								<tr>
									<th>Posicion</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Puntaje</th>
							    </tr>
							<?php
								include_once("../db/connect.php");
								$link1 = conectar();
								$result1 = mysqli_query($link1 ,"SELECT * FROM usuario ORDER BY usuario.puntaje desc");
								$index = 1;
								while($row = mysqli_fetch_array($result1)){?>
									<tr>
										<td><?php echo $index; $index = $index + 1; ?></td>
										<td><?php echo $row['nombre'];?></td>
										<td><?php echo $row['apellido'];?></td>
										<td><?php echo $row['puntaje'];?></td>
									</tr>
								<?php
								}
								mysqli_close($link1);
								;
							?>
							</table></center>
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