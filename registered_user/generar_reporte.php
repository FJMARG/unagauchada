<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Reporte</title> <!-- Titulo de la pagina -->
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
						<center><h1 class="w3-theme-black">Reporte de ganancias</h1><br>
						<table class="w3-table w3-round w3-striped w3-centered">
								<tr>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Creditos comprados</th>
									<th>Precio</th>
									<th>Fecha de compra</th>
							    </tr>
						<?php
							include_once("../db/connect.php");
							$link1 = conectar();
							$resultados = mysqli_query($link1 ,"SELECT compracredito.cantidad, compracredito.precio , usuario.nombre , usuario.apellido , compracredito.fecha from compracredito inner join usuario on(compracredito.id_usuario = usuario.id) WHERE compracredito.fecha between '$_POST[fechainicio]' and '$_POST[fechafinal]' order by compracredito.fecha");
							$index = 0;
							while($row = mysqli_fetch_array($resultados)){
								$index = $index + $row['precio'];?>
								<tr>
									<td><?php echo $row['nombre'];?></td>
									<td><?php echo $row['apellido'];?></td>
									<td><?php echo $row['cantidad'];?></td>
									<td><?php echo $row['precio'];?></td>
									<td><?php echo $row['fecha'];?></td>
								</tr>
							<?php } ?>
						</table><br>
						<?php
							echo "<h2>Total de ganancia: ".$index."<h2><br>";
							mysqli_close($link1);
						?>
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