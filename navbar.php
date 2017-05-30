<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a href="favores.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Favores</a>
    <a href="comprar.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Comprar cr&eacute;ditos</a>
    <a href="publicar_form.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Publicar Favor</a>
    <a href="../session/logout.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Cerrar Sesi&oacute;n</a>
    <a class="w3-bar-item w3-right"> 
      Creditos:
      <?php
		include_once ('../db/connect.php');
		$link = conectar();
		$result = mysqli_query ($link, "SELECT * FROM usuario WHERE id = '$_SESSION[id]'");
		$array = mysqli_fetch_array($result);
		$result2 = mysqli_query ($link, "SELECT * FROM credito WHERE id_usuario = '$array[id]'");
		$array2= mysqli_fetch_array($result2);
		mysqli_close($link);
        echo $array2['cantidad'];
      ?>
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      &nbsp;
      Bienvenido
      <?php
        echo $array['nombre']." ".$array['apellido'];
      ?>
    </a>
  </div>
</div>