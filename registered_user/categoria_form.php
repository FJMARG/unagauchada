<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Categorias</title> <!-- Titulo de la pagina -->
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
						<center><h1 class="w3-theme-black">Categorias</h1><br>
						<?php
							if (isset($_GET['id'])&& ($_GET['id'] == "correcto")){
								echo "<p style='color:green;'>Se agrego la categoria correctamente.</p>";
							}else if(isset($_GET['id'])&& ($_GET['id'] == "incorrecto")){
								echo "<p style='color:red;'>Esa categoria ya existe.</p>";
							}else if(isset($_GET['id'])&& ($_GET['id'] == "correcto2")){
								echo "<p style='color:green;'>Eliminaste la categoria correctamente.</p>";
							}
						?>
						<div class="w3-panel w3-border w3-border-orange w3-round-large">
						<center><h3 class="w3-theme-black">Agregar categoria</h3>
						<form class="w3-form w3-panel" method="post" action="agregar_categoria.php">
							<p>Nombre de categoria: <input type="text" class="w3-round" id="categoria1" name="categoria1"></p>
							<button class="w3-btn w3-round">Agregar</button>
						</form>
						<br>
						<center><h3 class="w3-theme-black">Eliminar categoria</h3>
						<form class="w3-form w3-panel" method="post" action="eliminar_categoria.php">
							<p>Seleccionar: 
							<select class="w3-round" name="categoria2" id="categoria2">
								<?php
									include_once ("../db/connect.php");
									$link = conectar();
									$result = mysqli_query ($link, "SELECT * FROM categoria");
									while ($row = mysqli_fetch_array($result)){ 
										if($row['nombre'] != "Otros"){?>
										<option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"]; ?></option>
								<?php
								}}
									mysqli_free_result($result);
									mysqli_close($link);
								?>		
							</select></p>
							<button class="w3-btn w3-round">Eliminar</button>
						</form>
						</div>
						</center>
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