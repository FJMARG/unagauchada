<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Favores</title> <!-- Titulo de la pagina -->
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
<body>
<?php
	/* Barra de busqueda */
	include_once("./buscar_favores.php");
?>
	<hr style="background-color: orange; height: 1px; margin: 0;">
	<iframe id="mostrarfavores" name="mostrarfavores" width="100%" height="70%" style="border:none; position: fixed; bottom: 10%; left: 0; right:0;" src="./mostrar_favores.php"></iframe>
	<div id="footer" class="w3-grey" style="position: fixed; bottom: 0; width: 100%; height: 10%;">
		<br>
		<center><font size="3">GSoft Web Designer &copy;</font><center>
		<br>
	</div>
</body>
</html>