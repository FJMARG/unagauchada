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
					<p><center><h1>Perfil de usuario</h1></center></p>
					<div class="w3-panel w3-border w3-border-orange w3-round-large">
						<?php
							include_once ('../db/connect.php');
							$link = conectar();
							$user = mysqli_query($link ,"SELECT * from usuario where usuario.id = '$_GET[id]'");
							$datos = mysqli_fetch_array($user);
							$creditos= mysqli_query ($link, "SELECT * FROM credito WHERE credito.id_usuario = '$_GET[id]'");
							$datos2= mysqli_fetch_array($creditos);
						?>
						<center>
						<br><br>
						<img class="w3-round" src='/image/favor/<?php echo "$datos[foto]"; ?>' width="300" height="300"/>
						<br><br>
						<p><h3><strong>Nombre: </strong><i><?php echo $datos['nombre']." ".$datos['apellido']; ?></i></h3></p>
						<p><h3><strong>Email: </strong><i><?php echo $datos['email']; ?></i></h3></p>
						<p><h3><strong>Fecha De Nacimiento: </strong><i><?php echo $datos['fecnac']; ?></i></h3></p>
						<?php if($datos['id'] == $_SESSION['id']){?>
						<p><h3><strong>Telefono: </strong><i><?php echo $datos['tel']; ?></i></h3></p>
						<p><h3><strong>Creditos: </strong><i><?php echo $datos2['cantidad']; ?></i></h3></p>
						<?php }?>
						<p><h3><strong>Puntos: </strong><i>
						<?php
							echo $datos['puntaje'];
							include_once("calcular_rango.php");
							mysqli_close($link);
						?>
						</i></h3></p>
						</center>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div id="footer" class="w3-light-orange" style="bottom: 0; width: 100%; height: 10%;">
		<br>
		<center><font size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>	
</body>
</html>