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
	<div class="w3-main">
		<div class="w3-padding-64">
			<div class="w3-container" style="margin-left:350px">
				<div style="margin-right:350px">
					<p><center><h1>Mis postulaciones</h1></center></p>
						<?php
							include_once ('../db/connect.php');
							$link = conectar();
							$result = mysqli_query($link ,"SELECT * from postula inner join favor on(postula.id_favor = favor.id) where postula.id_usuario = '$_SESSION[id]'");
							if (mysqli_num_rows($result)!=0){
							while ($array = mysqli_fetch_array($result)){?>
								<div class="w3-panel w3-border w3-border-orange w3-round-large">
									<p> Titulo del favor: <?php echo $array['titulo']?></p>
									<p> Estado del favor:
										<?php
											if($array['activo'] == 1){ 
												echo "Activo.";
											}else{
												echo "Terminado.";
											}
										?>
									</p>
									<p> <?php 
											if(($array['elegido'] == 0)and($array['activo'] == 1)){ 
												echo "<font color=orange>Aun no fuiste elegido para este favor.</font>";
											}else if (($array['elegido'] == 1)and($array['activo'] == 0)){
												echo "<font color=green>Fuiste elegido para este favor.</font>";
											}else if (($array['elegido'] == 0)and($array['activo'] == 0)){
												echo "<font color=red>No fuiste elegido para este favor.</font>";
											}
										?>
									</p>
									<p><a class="w3-btn w3-round-large" href="./preguntas.php?id=<?php echo $array['id_favor']?>">Ver favor</a></p>
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