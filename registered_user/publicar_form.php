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
					<center><h1 class="w3-theme-black">Publica Tu Favor</h1></center>
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
					<script language= "javascript" src="../js/jquery-3.2.1.js"></script>
					<script language= "javascript" src="../js/validarCamposFavor.js"></script>
					<?php /*
						$link = conectar();
						$result = mysqli_query($link, "SELECT cantidad FROM credito WHERE id_usuario='$_SESSION[id]'");
						$array = mysqli_fetch_array($result); */
					?>
					<form class="w3-form w3-panel w3-border w3-border-orange w3-round-large" method="post" enctype="multipart/form-data" action="./publicar.php" onsubmit="validar(event,<?php echo $_SESSION['id'];?>);">
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
						<p>Descripcion:</p>
						<textarea class="w3-round" type="text" name="descripcion" id="descripcion" cols="50" rows="5"></textarea>
						<p>Fecha Limite:<input class="w3-input w3-round" type="date" name="fecha" id="fecha" placeholder="AAAA-MM-DD"></p>
						<p>Localidad:<br><br>
						<select class="w3-round" name="loc" id="loc">
							<?php
								include_once ("../db/connect.php");
								$link = conectar();
								$result = mysqli_query ($link, "SELECT * FROM localidades");
								while ($row = mysqli_fetch_array($result)){ ?>
								<option value="<?php echo $row["localidad"]; ?>"><?php echo $row["localidad"];?></option>
							<?php
							}
								mysqli_free_result($result);
								mysqli_close($link);
							?>		
						</select>
						<p>Foto: <input class="w3-round" type="file" name="foto" id="foto"></p>
						<p><button class="w3-btn w3-round">Publicar</button></p>
					</form>
				</div>
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