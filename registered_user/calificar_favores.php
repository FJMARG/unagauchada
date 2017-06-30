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
					<center><h2>Calificaciones pendientes</h2>
					<?php 
						include_once("../db/connect.php");
						$con = conectar();
						$favores = mysqli_query($con , "SELECT * FROM favor where id_usuario = '$_SESSION[id]' and activo = 0 ");
						if(isset($_GET['id']) and ($_GET['id'] == "correcto")){
							echo "<font color='green'><center> Calificaste el favor correctamente. </center></font>";
						}
						$cant = 0;
						while($fav = mysqli_fetch_array($favores)){
							$calificado= mysqli_query($con ,"SELECT * FROM calificacion WHERE id_favor = '$fav[id]'");
							if (mysqli_num_rows($calificado)==0){
								$cant = $cant + 1;
								$postul = mysqli_query($con, "SELECT * from postula where id_favor = $fav[id] and elegido = 1");
								$postu = mysqli_fetch_array($postul);
								$user = mysqli_query($con, "SELECT * from usuario where id = '$postu[id_usuario]'");
								$usuario = mysqli_fetch_array($user);  ?>
								<div class="w3-border w3-border-orange w3-round-large">
									<p>Titulo del favor: <?php echo $fav['titulo']; ?></p>
									<p>Nombre: <?php echo $usuario['nombre']." ".$usuario['apellido']; ?></p>
									<p>Descripcion: <?php echo $postu['descripcion']; ?></p>
									<a href="calificar.php?id=<?php echo $fav['id'] ?>" class="w3-btn w3-round">Calificar</a><br><br>
								</div><br><br>
							<?php
							}
						}if($cant == 0){
							echo "No hay calificaciones pendientes.";
						}
						?>
					</center>
				</div>
			</div>
		</div>
	</div>
		<div id="footer" class="w3-grey" style="position: fixed; bottom: 0; width: 100%; height: 10%;">
		<br>
		<center><font size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>
</body>
</html>