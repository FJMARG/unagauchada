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
				<div class="w3-panel w3-border w3-border-orange w3-round-large">
					<div class="w3-row-padding ">
						<font size=4 face="arial">
							<center>
								<?php include_once('datos.php'); ?> 
								<h2> <?php echo $favor['titulo']; ?></h2>
								<img class="w3-round" src='/image/favor/<?php echo "$favor[foto]"; ?>' width="300" height="300"/>
								<br>
								<br>
								Dueño : &nbsp;&nbsp; 
								<?php echo $dueño['nombre']." ".$dueño['apellido']; ?>
								<br>
								Categoria:&nbsp;&nbsp; <?php echo $categoria['nombre']; ?>
								<br>
								Fecha Limite :&nbsp;&nbsp; <?php echo $favor['fechalimite']; ?>
								<br>
								Descripcion :&nbsp;&nbsp;
								<font size="3"><i><?php echo $favor['descripcion']; ?></i></font>
								<br>
								Ciudad :&nbsp;&nbsp;<?php echo $favor['ciudad']; ?>
								<br>
								<br>
							</center>
						</div>
					</div>
				</div>
				<script language= "javascript" src="../js/validarPregunta.js"></script>
				<center>
					<h1>Preguntas</h1><br><br>
					<?php
						if(mysqli_num_rows($result2) == 0) {
							echo 'No se realizaron preguntas en este favor. <br><br>';
						}
						else{
							while ($preguntas = mysqli_fetch_array($result2)){?>
								<?php include('ver_preguntas.php');
							}
						}
						if($favor['id_usuario'] != $_SESSION['id']){ ?>
							<h3> Realizar Pregunta: <h3>
							<form class="w3-form w3-panel w3-round-large" method="post" action="./preguntar.php" enctype="multipart/form-data" >
							<textarea class="w3-round" type="text" name="pregunta" id="pregunta" cols="55" rows="5"></textarea>
							<br><br>
							<p><button class="w3-btn w3-round" onclick="validarPregunta();"">Preguntar</button></p>
						<?php 
						}
						?>
				</center>
			</div>
		</div>
	</div>
	<div id="footer" class="w3-grey">
		<br>
		<center><font  size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>
</body>
</html>