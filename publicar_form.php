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
	<link href="../style.html" rel="import" /> <!-- Importa los CSS -->
</head>
<!-- Main -->
<body>
	<div class="w3-main" style="margin-left:350px">
		<div style="margin-right:350px">
			<div class="w3-row w3-padding-64">
				<div class="w3-container">
					<h1 class="w3-text-teal">Publica Tu Favor</h1>
					<?php 
						if(isset ($_GET['error']))
							if ($_GET['error'] == 0)
								echo "<font color='green'> Favor Publicado </font>";
							else 
								if($_GET['error'] == 1)
									echo "<font color='red'> No tienes los suficientes creditos para publicar un favor. </font>";
								else
									if ($_GET['error'] == 2)
										echo "<font color='red'> Ocurrio un error al procesar tu solicitud.</font>";
					?>
					<script language= "javascript" src="../js/validarCamposFavor.js"></script>
					<form class="w3-form w3-round-large w3-grey " method="post" enctype="multipart/form-data" action="./publicar.php" onsubmit="return validar()">
						<p>Titulo:<input class="w3-input w3-round" type="text" name="titulo" id="titulo"></p>
						<p>Categorias:<br><br>
						<select class="w3-round" name="categoria" id="categoria">
							<?php
								include_once ("../db/connect.php");
								$link = conectar();
								$result = mysqli_query ($link, "SELECT * FROM categoria");
								while ($row = mysqli_fetch_array($result)){ ?>
								<option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"]; ?></option>
							<?php
							}
								mysqli_free_result($result);
								mysqli_close($link);
							?>		
						</select>
						<p>Descripcion:<input class="w3-input w3-round" type="text" name="descripcion" id="descripcion"></p>
						<p>Fecha Limite:<input class="w3-input w3-round" type="date" name="fecha" id="fecha"></p>
						<p>Ciudad:<input class="w3-input w3-round" type="text" name="ciudad" id="ciudad"></p>
						<p>Foto: <input class="w3-round" type="file" name="foto" id="foto"></p>
						<p><button class="w3-btn w3-round">Publicar</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>