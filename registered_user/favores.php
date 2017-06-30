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
	<iframe id="mostrarfavores" name="mostrarfavores" width="100%" height="79%" style="border:none; position: fixed; bottom: 0%; left: 0; right:0;" src="./mostrar_favores.php"></iframe>
</body>
</html>