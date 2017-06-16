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
		
	<!-- -------------------------------------- Importa los CSS ---------------------------------------- -->
	<link rel="stylesheet" href="../css/w3.css">
	<link rel="stylesheet" href="../css/w3-theme-black.css">
	<!-- ----------------------------------------------------------------------------------------------- -->
	
</head>
<body>
<center>
<div class="w3-main" style="margin-right:450px; margin-left:450px">
	<div class="w3-padding-64">
    	<div class="w3-container"> 
			<h1 class="w3-theme-black">Comprar creditos</h1>
			<?php 
        	if (isset ($_GET['error']))
				if ($_GET['error']=="2")
					echo "<font color='red'> Ocurrio un error al procesar la solicitud. </font>";
				else
					if($_GET['error']=="1")
						echo "<font color='red'> Tarjeta invalida. Ingrese la tarjeta correctamente. </font>";
					else
						if($_GET['error'] =="0")
							echo "<font color='green'> Creditos comprados correctamente. </font>";
						else
							if ($_GET['error'] =="3")
								echo "<font color='green'> Los creditos se han comprado correctamente, pero se vendio menor cantidad (".$_GET['cant']." a $".$_GET['prec'].") porque superaba el maximo de creditos permitidos. </font>";
							else {
								echo "<font color='red'> La compra no se realizo, ya que ha superado el maximo de creditos permitidos. </font>";
							}
        	?>
			<script language= "javascript" src="../js/validarYCalcularCamposCompra.js"></script>
			<form class="w3-form w3-panel w3-border w3-border-orange w3-round-large" method="post" action="./verificar_compra.php" onsubmit="return validar()">
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
			<p><label>Tarjeta de cr&eacute;dito (16 digitos sin guiones): </label><input class="w3-round w3-medium" type="text" pattern="[0-9]{16}" name="tarjeta" id="tarjeta" placeholder="Ej:1342212348764923"></p>
			<p><label>Cantidad: </label><input class="w3-round w3-medium" type="number" name="cantidad" id="cantidad" placeholder="Numero de creditos" min="1" max="2147483647" oninput="calcular()"></p>
			
			<p>Total: <label name="total" id="total"></label></p>
			<p><button class="w3-round w3-btn">Comprar</button></p>
			</form>
		</div>
	</div>
</div>
</center>
</body>
</html>