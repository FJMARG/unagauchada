<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Comprar creditos</title> <!-- Titulo de la pagina -->
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico"> <!-- Icono de la web -->
	<?php
	/* Verifica estado de la sesion (si expiro). */
	include_once("../session/verifySession.php");

	/* Navbar */
	include_once("navbar.php");
	?>
	<link href="../style.html" rel="import" /> <!-- Importa los CSS -->
</head>
<body>
<center>
<div class="w3-main" style="margin-right:250px , margin-left:250px">
	<div class="w3-padding-64">
    	<div class="w3-container"> 
			<h1 class="w3-text-teal">Comprar creditos</h1>
			<?php 
        	if (isset ($_GET['error']))
				if ($_GET['error']=="2")
					echo "<font color='red'> Ocurrio un error al procesar la solicitud. </font>";
				else
					if($_GET['error']=="1")
						echo "<font color='red'> Ingrese la tarjeta correctamente. </font>";
					else
						if($_GET['error'] =="0")
							echo "<font color='green'> Creditos comprados correctamente. </font>";
        	?>
			<script language= "javascript" src="../js/validarYCalcularCamposCompra.js"></script>
			<form class="w3-form" method="post" action="./verificar_compra.php" onsubmit="return validar()">
			<p><label>Item: </label><select name="pack" id="pack" oninput="calcular()">
			<?php
				$link = conectar();
				$result = mysqli_query ($link, "SELECT * FROM tienda");
				while ($row = mysqli_fetch_array($result)){ ?>
				<option value="<?php echo $row['id'];?>,<?php echo $row['precio']; ?>"><?php echo $row["nombre"]." -> $".$row["precio"]; ?></option>
			<?php
			}
				mysqli_free_result($result);
				mysqli_close($link);
			?>
			</select></p>
			<p><label>Tarjeta de cr&eacute;dito: </label><input class="w3-round w3-medium" type="text" name="tarjeta" id="tarjeta" placeholder="Ej:1342-2123-4876-4923"></p>
			<p><label>Cantidad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input class="w3-round w3-medium" type="number" name="cantidad" id="cantidad" placeholder="Numero de creditos" oninput="calcular()"></p>
			
			<p>Total: <label name="total" id="total"></label></p>
			<p><button class="w3-round w3-btn">Comprar</button></p>
			</form>
		</div>
	</div>
</div>
</center>
</body>
</html>