<script language= "javascript" src="../js/sidebar.js"></script>
<div class="w3-sidebar w3-bar-block w3-light-orange w3-card-5 w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">&times;</button>
  <a class="w3-bar-item"><center> Bienvenido
      <?php
        include_once ('../db/connect.php');
        $link = conectar();
        $result = mysqli_query ($link, "SELECT * FROM usuario WHERE id = '$_SESSION[id]'");
        $array = mysqli_fetch_array($result);
        $result2 = mysqli_query ($link, "SELECT * FROM credito WHERE id_usuario = '$array[id]'");
        $array2= mysqli_fetch_array($result2);
        echo $array['nombre']." ".$array['apellido']."</center>";
      ?></a>
  <a class="w3-bar-item"><center> Creditos:
      <?php
        echo $array2['cantidad']."</center>";
      ?></a>
  <a href="ver_perfil.php?id=<?php echo $_SESSION['id']?>" class="w3-bar-item w3-light-orange w3-button">Ver Mi Perfil</a>
  <a href="ver_mis_favores.php" class="w3-bar-item w3-light-orange w3-button">Ver Mis Favores</a>
  <a href="#" class="w3-bar-item w3-light-orange w3-button">Modificar Perfil</a>
  <a href="#" class="w3-bar-item w3-light-orange w3-button">Ver Postulantes</a>
</div>

<div zclass="w3-main" id="main">
  <div class="w3-bar w3-orange w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-small w3-hover-white" onclick="w3_open()">&#9776;</a>
    <a href="favores.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Favores</a>
    <a href="comprar.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Comprar cr&eacute;ditos</a>
    <a href="publicar_form.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Publicar Favor</a>
    <a href="../session/logout.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Cerrar Sesi&oacute;n</a>
  </div>
</div>