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
						<center><h1 class="w3-theme-black">Datos de tu favor</h1></center>
							<script language= "javascript" src="../js/jquery-3.2.1.js"></script>
							<script language= "javascript" src="../js/validarCamposModFavor.js"></script>
							<form class="w3-form w3-panel w3-border w3-border-orange w3-round-large" method="post" enctype="multipart/form-data" action="./cambiar_favor.php?id=<?php echo $_GET['id']; ?>" onsubmit="return validarMod();">
								<?php
									include_once("../db/connect.php");
									$link = conectar();
									$resultado = mysqli_query($link,"SELECT * FROM favor Where id = '$_GET[id]'");
									$array = mysqli_fetch_array($resultado);
									if (isset ($_GET['correcto']) and ($_GET['correcto'] == 1)){
										echo "<font color='green'><center> Cambios realizados </center></font>";
									}
									elseif (isset ($_GET['correcto']) and ($_GET['correcto'] == 0)) {
										echo "<font color='red'><center> No cambiaste ningun campo </center></font>";
									}
								?>
								<br>
								<p>Titulo: <input class="w3-round" type="text" name="titulo" id="titulo" value="<?php echo $array['titulo']; ?>"></p>
								<p>Descripcion:<br><textarea class="w3-round" type="text" name="descripcion" id="descripcion" cols="60" rows="7"><?php echo $array['descripcion']; ?></textarea></p>
								<p>Categoria:<br>
								<select class="w3-round" name="categoria" id="categoria">
									<?php
										include_once ("../db/connect.php");
										$link = conectar();
										$result2 = mysqli_query ($link, "SELECT * FROM favor WHERE id='$_GET[id]'");
										$arreglo = mysqli_fetch_array($result2);
										$result = mysqli_query ($link, "SELECT * FROM categoria");
										while ($row = mysqli_fetch_array($result)){ 
											if($row["id"] != $arreglo["id_categoria"]){?>
											<option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"];?></option>
											<?php }else{ ?>
												<option selected value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"];?></option>
											<?php
											}
									}
										mysqli_free_result($result);
										mysqli_close($link);
									?>		
								</select>
								<p>Localidad:<br>
								<select class="w3-round" name="ciudad" id="ciudad">
									<?php
										include_once ("../db/connect.php");
										$link = conectar();
										$result = mysqli_query ($link, "SELECT localidad FROM localidades ORDER BY localidad");
										$result2 = mysqli_query ($link, "SELECT * FROM favor WHERE id='$_GET[id]'");
										$arreglo = mysqli_fetch_array($result2);
										while ($row = mysqli_fetch_array($result)){ 
											if($row["localidad"] != $arreglo["ciudad"]){?>
											<option value="<?php echo $row["localidad"]; ?>"><?php echo $row["localidad"];?></option>
											<?php }else{ ?>
												<option selected value="<?php echo $row["localidad"]; ?>"><?php echo $row["localidad"];?></option>
											<?php
											}
									}
										mysqli_free_result($result);
										mysqli_close($link);
									?>		
								</select>
								<p>Fecha Limite: <input class="w3-round" type="date" name="fecha" id="fecha" value="<?php echo $array['fechalimite'];?>"></p>
								<p>Cambiar foto: <input class="w3-round" type="file" name="foto" id="foto"></p>
								<center><button class="w3-btn w3-round" >Modificar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<div id="footer" class="w3-light-orange">
		<br>
		<center><font  size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>
</body>
</html>