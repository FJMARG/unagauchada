<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Privilegios</title>
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico">
	<?php
	include_once("../session/verifySession.php");
	if ($_SESSION['admin']==="1"){ /* Verifica si tiene privilegios para poder acceder a esta seccion. */
	include_once("./navbar.php");
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
						<center>
						<?php
						if (isset($_GET['ok'])&& isset($_GET['cant']) && ($_GET['cant'] > 1)){
							echo "<p style='color:green;'>Se han actualizado ".$_GET['cant']." personas con cambio de privilegios.</p>";
						}else if(isset($_GET['ok'])&& isset($_GET['cant']) && ($_GET['cant'] == 1)){
							echo "<p style='color:green;'>Se ha actualizado el cambio de privilegio.</p>";
						}else if(isset($_GET['ok'])&& isset($_GET['cant']) && ($_GET['cant'] == 0)){
							echo "<p style='color:orange;'>No se han realizado cambios.</p>";							
						}
						?>
						<form action="cambiar_privilegios.php" class="w3-form w3-panel w3-border w3-border-orange w3-round-large" method="post">
						<?php
							include_once ('../db/connect.php');
							$link = conectar();
							$result = mysqli_query ($link, "SELECT * FROM usuario");
							while ($array = mysqli_fetch_array($result)){
								if($array['admin'] == 1){
									$boolean = "Si";
								}else{
									$boolean ="No";
								}
								if($array['id'] != $_SESSION['id']){
								echo "<p><a> Nombre: ".$array['nombre'].". </a><br><a>Apellido: ".$array['apellido'].". </a><br><a>E-mail: ".$array['email'].".</a><br><a> Es admin: ".$boolean.".</a>";
								?>

								<input type="checkbox" name="idusuario[]" value="<?php echo $array["id"]."-".$array["admin"]; ?>"></p>
								<hr style="background-color: orange; width: 100%; height: 1px;margin:1%;">
								<?php
							}}
						?>
						<button class="w3-btn w3-round">Aceptar.</button>
						</form>
						</center>
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
<?php
	}
	else{
		echo "</head>";
		echo "<a style='color:red;'>Usted no tiene permiso para acceder a esta secci&oacute;n.</a>";
	}
?>
</html>