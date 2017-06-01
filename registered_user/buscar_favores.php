<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Favores</title>
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico">
	<?php
	include_once("../session/verifySession.php");
	include_once("navbar.php");
	?>
	<link href="../style.html" rel="import" />
</head>
<body>
	<div class="w3-main" style="margin-left:350px">
		<div style="margin-right:350px">
			<div class="w3-padding-64">
				<div class="w3-container">
					<?php
						if (isset ($_GET['error']) and ($_GET['error'] == "1"))
							echo "<font color='red'> No tienes los suficientes creditos para publicar un favor. </font>";
					?>
					<h1 class="w3-text-teal">Favores</h1>
					<center><form method="POST" action="buscar_favores.php"> 
					Palabra clave: <input class="w3-round" type="text" name="palabra" size="20"><br><br> 
					<button class="w3-btn w3-round">Buscar</button>
					</form></center>
					<div class="w3-row-padding">
					<?php
						if(isset($_POST['palabra']) && !empty($_POST['palabra'])){
						include_once ('../db/connect.php');
						$link = conectar();
						$palabra = $_POST['palabra'];
						$result = mysqli_query($link,
							"SELECT * FROM favor 
							WHERE titulo LIKE '%$palabra%' OR
							ciudad LIKE '%$palabra%' OR
							(SELECT nombre from categoria where categoria.id = favor.id_categoria) LIKE '%$palabra%'
							AND CURDATE() <= fechalimite AND activo = 1"); 
						mysqli_close($link);
						include_once("mostrar_favores.php");
						}else{
						header("location: /registered_user/favores.php?id=incorrecto");
						}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>