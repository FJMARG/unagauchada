<!DOCTYPE html>
<html>
<head>
	<title>Una Gauchada - Mis Postulaciones</title>
	<link rel="shortcut icon" type="image/x-icon" href="../image/icono_gauchada.ico">
	<?php
	include_once("../session/verifySession.php");
	include_once("navbar.php");
	?>
		
	<!-- -------------------------------------- Importa los CSS ---------------------------------------- -->
	<link rel="stylesheet" href="/css/w3.css">
	<link rel="stylesheet" href="/css/w3-theme-black.css">
	<!-- ----------------------------------------------------------------------------------------------- -->
	
</head>
<body>
	<div style="position: fixed; background-color: white; margin-top:2%;padding-bottom:1.175%;padding-top:3%;width:100%;">
		<center>
		<form action="./ver_mis_postulaciones.php" method="post">
			<label for="orden">Ordenar por: </label>
			<select name="o" id="o">
				<option value="">Por defecto</option>
				<option value="pendiente" <?php if (isset ($_POST['o'])) if ($_POST['o']==="pendiente") echo "selected"; ?>>Pendiente</option>
				<option value="calificado" <?php if (isset ($_POST['o'])) if ($_POST['o']==="calificado") echo "selected"; ?>>Calificado</option>
			</select>
			<label>&nbsp;&nbsp;&nbsp;</label>
			<button class="w3-btn w3-round">Ordenar</button>
		</form>
		</center>
	</div>
	<hr style="position: fixed; background-color: orange; width: 100%; height: 1px; margin-top: 8.5%">
	<div class="w3-main">
		<div class="w3-padding-64">
			<div class="w3-container" style="margin-left:350px;margin-top:3%; padding-top:3%;">
				<div style="margin-right:350px">
					<p><center><h1>Mis postulaciones</h1></center></p>
						<?php
							include_once ('../db/connect.php');
							$link = conectar();
							if ((isset($_POST['o'])) && (!empty($_POST['o']))){
								switch ($_POST['o']){
									case "pendiente":
										$consulta = "SELECT f.*, p.elegido, p.id_favor, COUNT(c.id) AS cant from (postula p inner join favor f on(p.id_favor = f.id)) left join calificacion c on (c.id_favor = f.id) where p.id_usuario = '$_SESSION[id]' group by f.id order by cant ASC";
										break;
									case "calificado":
										$consulta = "SELECT f.*, p.elegido, p.id_favor, COUNT(c.id) AS cant from (postula p inner join favor f on(p.id_favor = f.id)) left join calificacion c on (c.id_favor = f.id) where p.id_usuario = '$_SESSION[id]' group by f.id order by cant DESC";
										break;
								}
							}
							else{
								$consulta = "SELECT f.*, p.elegido, p.id_favor, COUNT(c.id) AS cant from (postula p inner join favor f on(p.id_favor = f.id)) left join calificacion c on (c.id_favor = f.id) where p.id_usuario = '$_SESSION[id]' group by f.id";
							}
							$result = mysqli_query($link ,$consulta);
							if (mysqli_num_rows($result)!=0){
							while ($array = mysqli_fetch_array($result)){?>
								<div class="w3-panel w3-border w3-border-orange w3-round-large">
									<p> <b>Titulo del favor</b>: <?php echo $array['titulo']?></p>
									<p> <b>Estado del favor</b>:
										<?php
											if($array['cant'] == 0){ 
												echo "<font color=orange>Aun no fue cumplido.</font>";
											}else{
												echo "<font color=green>Ya fue cumplido.</font>";
											}
										?>
									</p>
									<p> <?php 
											if(($array['elegido'] == 0)and($array['activo'] == 1)){ 
												echo "<font color=orange>Estas postulado a este favor pero aun no fuiste elegido.</font>";
											}else if (($array['elegido'] == 1)and($array['activo'] == 0)){
												echo "<font color=green>Fuiste elegido para este favor.</font>";
											}else if (($array['elegido'] == 0)and($array['activo'] == 0)){
												echo "<font color=red>No fuiste elegido para este favor.</font>";
											}
										?>
									</p>
									<p><a class="w3-btn w3-round-large" href="./preguntas.php?id=<?php echo $array['id_favor']; if (isset ($_POST['o'])) echo "&o=".$_POST['o'];?>&p=yes">Ver favor</a></p>
								</div>
							<?php
							}}else{
								echo "No eres candidato a ningun favor.";
							}
							mysqli_close($link);
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