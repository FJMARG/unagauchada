<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Reputación</title> <!-- Titulo de la pagina -->
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
		<script language= "javascript" src="../js/jquery-3.2.1.js"></script>
		<script language="javascript" src="../js/reputacion.js"></script>
		<script language="javascript" src="../js/revisarReputacion.js"></script>
		<div class="w3-main" style="margin-left:350px">
			<div style="margin-right:350px">
				<div class="w3-row w3-padding-64">
					<div class="w3-container">
						<center><h1 class="w3-theme-black">Reputaciones</h1><br>
							<?php
									include_once ("../db/connect.php");
									$link = conectar();
									$resultado = mysqli_query ($link, "SELECT * FROM reputacion");
									echo "<div style='overflow:auto;height:300px;'><table style='border: 1px solid orange;border-spacing: 5px;'>";
									echo "<tr><th>Nombre</th><th>Puntaje Minimo</th><th>Puntaje Maximo</th></tr>";
									while ($vector = mysqli_fetch_array($resultado)){ 
										echo "<tr><td> ".$vector['nombre']."</td><td>".$vector['puntajemin']."</td><td>".$vector['puntajemax']."</td></tr>";
									}
									echo "</table></div><br>";
									mysqli_free_result($result);
									mysqli_close($link);
								?>
						<?php
							if (isset($_GET['id'])&& ($_GET['id'] == "correcto")){
								echo "<p style='color:green;'>Se agrego la reputacion correctamente.</p>";
							}else if(isset($_GET['id'])&& ($_GET['id'] == "incorrecto")){
								echo "<p style='color:red;'>Esa reputacion ya existe.</p>";
							}else if(isset($_GET['id'])&& ($_GET['id'] == "correcto2")){
								echo "<p style='color:green;'>Eliminaste la reputacion correctamente.</p>";
							}else if(isset($_GET['id'])&& ($_GET['id'] == "correcto3")){
								echo "<p style='color:green;'>Modificaste la reputacion correctamente.</p>";
							}
						?>
						<div class="w3-panel w3-border w3-border-orange w3-round-large">
						<center><h3 class="w3-theme-black">Agregar Reputación</h3>
						<form id="agregarReputacion" class="w3-form w3-panel" method="post" action="agregar_reputacion.php">
							<p>Nombre de Reputación: <input type="text" class="w3-round" id="nombrereputacion" name="nombrereputacion"></p>
							<p>Puntaje M&iacute;nimo: <input type="number" class="w3-round" id="puntajemin" name="puntajemin"></p>
							<p>Puntaje M&aacute;ximo: <input type="number" class="w3-round" id="puntajemax" name="puntajemax"></p>
							<button class="w3-btn w3-round">Agregar</button>
						</form>
						</div>
						<br>
						<div class="w3-panel w3-border w3-border-orange w3-round-large">
						<center><h3 class="w3-theme-black">Modificar Reputación</h3>
						<select class="w3-round" name="nombrereputacion2" id="nombrereputacion2" oninput="rellenarCampos();">
								<option value="">Seleccione categoria a modificar.</option>
								<?php
									include_once ("../db/connect.php");
									$link = conectar();
									$result = mysqli_query ($link, "SELECT * FROM reputacion WHERE nombre != 'Irresponsable' AND nombre != 'Observador'");
									while ($row = mysqli_fetch_array($result)){ 
									?>
										<option value="<?php echo $row["id"]."-".$row["nombre"]."-".$row["puntajemin"]."-".$row["puntajemax"]; ?>"><?php echo $row['nombre']." (".$row['puntajemin']." - ".$row['puntajemax'].")"; ?></option>
								<?php
								}
									mysqli_free_result($result);
									mysqli_close($link);
								?>		
						</select>
						<form id="modificarReputacion" class="w3-form w3-panel" method="post" action="modificar_reputacion.php">
							<p>Nombre de Reputación: <input type="text" class="w3-round" id="nombrereputacion3" name="nombrereputacion3" value=""></p>
							<p>Puntaje M&iacute;nimo: <input type="number" class="w3-round" id="puntajemin2" name="puntajemin2" value=""></p>
							<p>Puntaje M&aacute;ximo: <input type="number" class="w3-round" id="puntajemax2" name="puntajemax2" value=""></p>
							<input type="hidden" class="w3-round" id="idreputacion" name="idreputacion">
							<button class="w3-btn w3-round">Modificar</button>
						</form>
						</div>
						<br>
						<div class="w3-panel w3-border w3-border-orange w3-round-large">
						<center><h3 class="w3-theme-black">Eliminar Reputación</h3>
						<form id="eliminarReputacion" class="w3-form w3-panel" method="post" action="eliminar_reputacion.php" onSubmit="validarCamposEliminar(event)">
							<p>Seleccionar: 
							<select class="w3-round" name="idreputacion" id="idreputacion">
								<?php
									include_once ("../db/connect.php");
									$link = conectar();
									$result = mysqli_query ($link, "SELECT * FROM reputacion WHERE nombre != 'Irresponsable' AND nombre != 'Observador'");
									while ($row = mysqli_fetch_array($result)){ 
									?>
										<option value="<?php echo $row["id"]; ?>"><?php echo $row['nombre']." (".$row['puntajemin']." - ".$row['puntajemax'].")"; ?></option>
								<?php
								 }
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