<script language= "javascript" src="../js/jquery-3.2.1.js"></script>
<script language= "javascript" src="../js/sidebar.js"></script>
<div class="w3-sidebar w3-bar-block w3-light-orange w3-card-5 w3-animate-left" style="display:none; top: 0%;" id="mySidebar">
	<button id="close" class="w3-bar-item w3-button w3-large" onclick="w3_close()">&times;</button>
	<?php
		include ("./sidebar-data.php");
	?>
	<a href="ver_perfil.php?id=<?php echo $_SESSION['id']?>" class="w3-bar-item w3-light-orange w3-button">Ver Mi Perfil</a>
	<a href="favores.php?owner=yes" class="w3-bar-item w3-light-orange w3-button">Ver Mis Favores</a>
	<a href="modificar_perfil.php" class="w3-bar-item w3-light-orange w3-button">Modificar Perfil</a>
	<a href="ver_postulantes.php" class="w3-bar-item w3-light-orange w3-button">Ver Postulantes</a>
	<a href="calificar_favores.php" class="w3-bar-item w3-light-orange w3-button">Calificar Favores</a>
	<a href="mis_calificaciones.php" class="w3-bar-item w3-light-orange w3-button">Ver mis calificaciones</a>
	<a href="../session/logout.php" class="w3-bar-item w3-light-orange w3-button">Cerrar Sesi&oacute;n</a>
</div>
<div class="w3-main" id="main">
  <div class="w3-bar w3-orange w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-small w3-hover-white" onclick="w3_open(<?php echo $_SESSION['id'];?>)">&#9776;</a>
    <a href="favores.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Favores</a>
    <a href="comprar.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Comprar cr&eacute;ditos</a>
    <a href="publicar_form.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Publicar Favor</a>
  </div>
</div>